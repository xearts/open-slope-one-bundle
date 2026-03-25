<?php

declare(strict_types=1);

namespace Xearts\OpenSlopeOneBundle\Service;

use Doctrine\DBAL\Platforms\MySQLPlatform;
use Doctrine\ORM\EntityManagerInterface;

class Initializer
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function initialize(): void
    {
        $connection = $this->entityManager->getConnection();

        $connection->executeQuery('TRUNCATE TABLE `open_slope_one`');

        $platform = $connection->getDatabasePlatform();
        if ($platform instanceof MySQLPlatform) {
            $this->initializeByMySql();
        } else {
            $this->initializeByPhp();
        }
    }

    private function initializeByPhp(): void
    {
        $connection = $this->entityManager->getConnection();
        $sql = "INSERT INTO open_slope_one (item_id1, item_id2, times, rating)
            SELECT a.item_id, b.item_id, COUNT(*), SUM(a.rating - b.rating)
            FROM open_slope_one_rating a
            INNER JOIN open_slope_one_rating b ON a.user_id = b.user_id
            WHERE a.item_id != b.item_id
            GROUP BY a.item_id, b.item_id";

        $connection->executeQuery($sql);
    }


    private function initializeByMySql()
    {
        if (!$this->hasProcedure())
        {
            $this->createProcedure();
        }
        $this->entityManager->getConnection()->executeQuery('call slope_one');
    }

    private function hasProcedure(): bool
    {
        $connection = $this->entityManager->getConnection();
        $sql = 'show procedure status where Db = "' . $connection->getDatabase() . '" and name= "slope_one"';

        return $connection->fetchOne($sql) ? true : false;
    }

    private function createProcedure(): void
    {
        $sql = '
            CREATE PROCEDURE `slope_one`()
                begin                    
                    DECLARE tmp_item_id int;
                    DECLARE done int default 0;                    
                    DECLARE mycursor CURSOR FOR select distinct item_id from open_slope_one_rating;
                    DECLARE CONTINUE HANDLER FOR NOT FOUND set done=1;
                    open mycursor;
                    while (!done) do
                        fetch mycursor into tmp_item_id;
                        if (!done) then
                            insert into open_slope_one (select a.item_id as item_id1,b.item_id as item_id2,count(*) as times, sum(a.rating-b.rating) as rating from open_slope_one_rating a,open_slope_one_rating b where a.item_id = tmp_item_id and b.item_id != a.item_id and a.user_id=b.user_id group by a.item_id,b.item_id);
                        end if;
                    END while;
                    close mycursor;
                end
        ';
        $this->entityManager->getConnection()->executeQuery($sql);
    }

}