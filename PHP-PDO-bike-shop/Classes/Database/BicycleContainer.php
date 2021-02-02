<?php

require_once 'Classes/Database/PDOConnection.php';
require_once 'Classes/Bicycle.php';

class BicycleContainer  extends PDOConnection
{
    public function getAll():array
    {
        // the result array with all skis
        $bicycleList = [];
        // connect to the database
        $pdo = $this->connect();
        // prepare the sql statement
        $statement = $pdo->prepare('select ID, Brand, `Name`, Category, Price, Color, `Size`, Brakes, Shifter, Fork, Shock from Bicycle');
        // tell the statement to fetch the result via associated arrays (key -> value)
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        // execute the statement against the connected db
        $statement->execute();

        // fetch the result row by row
        while (($row = $statement->fetch()) != null)
        {
            // get the row attributes and build with them a new device object
            $b = new Bicycle($row['ID'], $row['Brand'],$row['Name'],$row['Category'],$row['Price'], $row['Color'], $row['Size'], $row['Brakes'], $row['Shifter'], $row['Fork'], $row['Shock']);
            // add the new device to the result array
            $bicycleList[$row['ID']] = $b;
        }

        // attention: without a try/catch any exceptions is thrown up to caller of this method

        return $bicycleList;
    }

    public function add($ID, $Brand, $Name, $Category, $Price, $Color, $Size, $Brakes, $Shifter, $Fork, $Shock) {
        // here it is important to surround the action with try/catch!
        try
        {
            // connect to the database
            $pdo = $this->connect();
            // we are changing the database content
            // so begin a transaction
            $pdo->beginTransaction();

            // create the sql statement
            $statement = $pdo->prepare('insert into Bicycle(ID, Brand, `Name`, Category, Price, Color, `Size`, Brakes, Shifter, Fork, Shock) values (?,?,?,?,?,?,?,?,?,?,?)');
            // fill in the params
            $statement->bindParam(1,$ID);
            $statement->bindParam(2,$Brand);
            $statement->bindParam(3,$Name);
            $statement->bindParam(4,$Category);
            $statement->bindParam(5,$Price);
            $statement->bindParam(6,$Color);
            $statement->bindParam(7,$Size);
            $statement->bindParam(8,$Brakes);
            $statement->bindParam(9,$Shifter);
            $statement->bindParam(10,$Fork);
            $statement->bindParam(11,$Shock);

            // execute the statement
            $statement->execute();
            // and commit the transation
            $pdo->commit();
            // return true if everything was fine
            return true;
        }
        catch (PDOException $e) // catch the PDOException separately!
        {
            if(isset($pdo)){
                $pdo->rollback(); // rollback the transaction
            }
            //echo 'Error accessing database!';
            throw($e); // throw the exception to the caller
        }
        catch (Exception $e)
        {
            if(isset($pdo)){
                $pdo->rollback();
            }
            //echo 'Error: ' . $e->getMessage();
            throw($e);
        }
        finally {
            $pdo = null; // always close the db connection
        }
    }

    public function change($ID, $Brand, $Name, $Category, $Price, $Color, $Size, $Brakes, $Shifter, $Fork, $Shock) {
        try{
            $pdo = $this->connect();
            $pdo->beginTransaction();

            $statement = $pdo->prepare('update Bicycle set Brand = ?, `Name` = ?, Category = ?, Price = ?, Color = ?, `Size` = ?, Brakes = ?, Shifter = ?, Fork = ?, Shock = ? WHERE ID = ? ');

            $statement->bindParam(1,$Brand);
            $statement->bindParam(2,$Name);
            $statement->bindParam(3,$Category);
            $statement->bindParam(4,$Price);
            $statement->bindParam(5,$Color);
            $statement->bindParam(6,$Size);
            $statement->bindParam(7,$Brakes);
            $statement->bindParam(8,$Shifter);
            $statement->bindParam(9,$Fork);
            $statement->bindParam(10,$Shock);
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

            $statement = $pdo->prepare('delete from Bicycle  where ID = ?');

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

            $statement = $pdo->prepare('select ID, Brand, `Name`, Category, Price, Color, `Size`, Brakes, Shifter, Fork, Shock from Bicycle where ID = ?');
            $statement->bindParam(1, $ID);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();

            $row = $statement->fetch();
            if ($row != null)
            {
                $b = new Bicycle($row['ID'], $row['Brand'],$row['Name'],$row['Category'],$row['Price'], $row['Color'], $row['Size'], $row['Brakes'], $row['Shifter'], $row['Fork'], $row['Shock']);
                return $b;
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