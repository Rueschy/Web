<?php

require_once 'Classes/Database/PDOConnection.php';
require_once 'Classes/Motorcycle.php';

class MotorcycleContainer extends PDOConnection
{
    public function getAll():array
    {
        $motorcycleList = [];
        $pdo = $this->connect();
        $statement = $pdo->prepare('select ID, Brand, `Name`, Category, Price, Engine, CubicCapacity, Power, Brakes, Suspension, TopSpeed from Motorcycle');
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();

        while (($row = $statement->fetch()) != null)
        {
            $m = new Motorcycle($row['ID'], $row['Brand'],$row['Name'],$row['Category'],$row['Price'], $row['Engine'], $row['CubicCapacity'], $row['Power'], $row['Brakes'], $row['Suspension'], $row['TopSpeed']);
            $motorcycleList[$row['ID']] = $m;
        }

        return $motorcycleList;
    }

    public function add($ID, $Brand, $Name, $Category, $Price, $Engine, $CubicCapacity, $Power, $Brakes, $Suspension, $TopSpeed) {

        try
        {
            $pdo = $this->connect();
            $pdo->beginTransaction();

            $statement = $pdo->prepare('insert into Motorcycle(ID, Brand, `Name`, Category, Price, Engine, CubicCapacity, Power, Brakes, Suspension, TopSpeed) values (?,?,?,?,?,?,?,?,?,?,?)');

            $statement->bindParam(1,$ID);
            $statement->bindParam(2,$Brand);
            $statement->bindParam(3,$Name);
            $statement->bindParam(4,$Category);
            $statement->bindParam(5,$Price);
            $statement->bindParam(6,$Engine);
            $statement->bindParam(7,$CubicCapacity);
            $statement->bindParam(8,$Power);
            $statement->bindParam(9,$Brakes);
            $statement->bindParam(10,$Suspension);
            $statement->bindParam(11,$TopSpeed);

            $statement->execute();
            $pdo->commit();
            return true;
        }
        catch (PDOException $e)
        {
            if(isset($pdo)){
                $pdo->rollback();
            }
            throw($e);
        }
        catch (Exception $e)
        {
            if(isset($pdo)){
                $pdo->rollback();
            }
            throw($e);
        }
        finally {
            $pdo = null;
        }
    }

    public function change($ID, $Brand, $Name, $Category, $Price, $Engine, $CubicCapacity, $Power, $Brakes, $Suspension, $TopSpeed) {
        try{
            $pdo = $this->connect();
            $pdo->beginTransaction();

            $statement = $pdo->prepare('update Motorcycle set Brand = ?, `Name` = ?, Category = ?, Price = ?, Engine = ?, CubicCapacity = ?, Power = ?, Brakes = ?, Suspension = ?, TopSpeed = ? WHERE ID = ? ');

            $statement->bindParam(1,$Brand);
            $statement->bindParam(2,$Name);
            $statement->bindParam(3,$Category);
            $statement->bindParam(4,$Price);
            $statement->bindParam(5,$Engine);
            $statement->bindParam(6,$CubicCapacity);
            $statement->bindParam(7,$Power);
            $statement->bindParam(8,$Brakes);
            $statement->bindParam(9,$Suspension);
            $statement->bindParam(10,$TopSpeed);
            $statement->bindParam(11,$ID);

            $statement->execute();

            $pdo->commit();
            return true;

        } catch (PDOException $e){
            if(isset($pdo)){
                $pdo->rollback();
            }
            throw($e);
        } catch (Exception $e){
            if(isset($pdo)){
                $pdo->rollback();
            }
            throw($e);
        } finally {
            $pdo = null;
        }
    }

    public function delete($ID) {
        try{
            $pdo = $this->connect();
            $pdo->beginTransaction();

            $statement = $pdo->prepare('delete from Motorcycle  where ID = ?');

            $statement->bindParam(1,$ID);

            $statement->execute();

            $pdo->commit();
            return true;

        } catch (PDOException $e){
            if(isset($pdo)){
                $pdo->rollback();
            }
            throw($e);
        } catch (Exception $e){
            if(isset($pdo)){
                $pdo->rollback();
            }
            throw($e);
        } finally {
            $pdo = null;
        }
    }

    public function get($ID) {
        try {
            $pdo = $this->connect();
            $pdo->beginTransaction();

            $statement = $pdo->prepare('select ID, Brand, `Name`, Category, Price, Engine, CubicCapacity, Power, Brakes, Suspension, TopSpeed from Motorcycle where ID = ?');
            $statement->bindParam(1, $ID);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();

            $row = $statement->fetch();
            if ($row != null)
            {
                $m = new Motorcycle($row['ID'], $row['Brand'],$row['Name'],$row['Category'],$row['Price'], $row['Engine'], $row['CubicCapactiy'], $row['Power'], $row['Brakes'], $row['Suspension'], $row['TopSpeed']);
                return $m;
            }
            return null;

        }
        catch (PDOException $e)
        {
            if(isset($pdo)){
                $pdo->rollback();
            }
            throw($e);
        }
        catch (Exception $e)
        {
            if(isset($pdo)){
                $pdo->rollback();
            }
            throw($e);
        }
        finally
        {
            $pdo = null;
        }
    }
}