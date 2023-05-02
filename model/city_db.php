<?php
function get_codes(): false|array
{
    global $cnx;
    $query = "SELECT DISTINCT Code FROM country";

    return $cnx->query($query)->fetchAll();
}

function get_cities($city){
    global $cnx;
    $query = "SELECT * FROM city
                            WHERE Name= :city
                            ORDER BY Population DESC";
    $statement = $cnx->prepare($query);

        $statement->bindValue(':city', $city);

    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    return $results;
}

function insert_city($city, $district, $population, $countryCode): int
{
    global $cnx;
    $query = "INSERT INTO city
                    (Name, CountryCode, District, Population)
                    VALUES
                    (:newcity, :countrycode, :district, :newpopulation)";
    $statement = $cnx->prepare($query);
    $statement->bindValue(':newcity', $city);
    $statement->bindValue(':countrycode', $countryCode);
    $statement->bindValue(':district', $district);
    $statement->bindValue(':newpopulation', $population);

    $count = $statement->execute();
    $statement->closeCursor();

    return $count;
}

function delete_city($id): int
{
    global $cnx;
    $query = "DELETE FROM city
                WHERE ID = :id";

    $statement = $cnx->prepare($query);
    $statement->bindValue(':id', $id);

    $count = $statement->execute();
    $statement->closeCursor();

    return $count;
}

function update_city($id, $city, $district, $population, $countryCode): int
{
    global $cnx;

    $query = 'UPDATE city 
    SET Name = :city, CountryCode = :countrycode, District = :district, 
        Population = :population WHERE ID = :id';

    $statement = $cnx->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':countrycode', $countryCode);
    $statement->bindValue(':district', $district);
    $statement->bindValue(':population', $population);

    $count = $statement->execute();


    $statement->closeCursor();
    return $count;
}