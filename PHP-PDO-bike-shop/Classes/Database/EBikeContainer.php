<?php

require_once 'Classes/Database/PDOConnection.php';
require_once 'Classes/EBike.php';

class EBikeContainer extends PDOConnection
{
    public function getAll():array
    {
        $ebikeList = [];
        $pdo = $this->connect();
        $statement = $pdo->prepare('select ID, Brand, `Name`, Category, Price, Color, `Size`, Engine, Power, Brakes, Shifter from EBike');
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();

        while (($row = $statement->fetch()) != null)
        {
            $eb = new EBike($row['ID'], $row['Brand'],$row['Name'],$row['Category'],$row['Price'], $row['Color'], $row['Size'], $row['Engine'], $row['Power'], $row['Brakes'], $row['Shifter']);
            $ebikeList[$row['ID']] = $eb;
        }

        return $ebikeList;
    }

    public function add($ID, $Brand, $Name, $Category, $Price, $Color, $Size, $Engine, $Power, $Brakes, $Shifter) {

        try
        {
            $pdo = $this->connect();
            $pdo->beginTransaction();

            $statement = $pdo->prepare('insert into EBike(ID, Brand, `Name`, Category, Price, Color, `Size`, Engine, Power, Brakes, Shifter) values (?,?,?,?,?,?,?,?,?,?,?)');

            $statement->bindParam(1,$ID);
            $statement->bindParam(2,$Brand);
            $statement->bindParam(3,$Name);
            $statement->bindParam(4,$Category);
            $statement->bindParam(5,$Price);
            $statement->bindParam(6,$Color);
            $statement->bindParam(7,$Size);
            $statement->bindParam(8,$Engine);
            $statement->bindParam(9,$Power);
            $statement->bindParam(10,$Brakes);
            $statement->bindParam(11,$Shifter);

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

    public function change($ID, $Brand, $Name, $Category, $Price, $Color, $Size, $Engine, $Power, $Brakes, $Shifter) {
        try{
            $pdo = $this->connect();
            $pdo->beginTransaction();

            $statement = $pdo->prepare('update EBike set Brand = ?, `Name` = ?, Category = ?, Price = ?, Color = ?, `Size` = ?, Engine = ?, Power = ?, Brakes = ?, Shifter = ? WHERE ID = ? ');

            $statement->bindParam(1,$Brand);
            $statement->bindParam(2,$Name);
            $statement->bindParam(3,$Category);
            $statement->bindParam(4,$Price);
            $statement->bindParam(5,$Color);
            $statement->bindParam(6,$Size);
            $statement->bindParam(7,$Engine);
            $statement->bindParam(8,$Power);
            $statement->bindParam(9,$Brakes);
            $statement->bindParam(10,$Shifter);
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

            $statement = $pdo->prepare('delete from EBike  where ID = ?');

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

            $statement = $pdo->prepare('select ID, Brand, Name, Category, Price, Color, `Size`, Engine, Power, Brakes, Shifter from EBike where ID = ?');
            $statement->bindParam(1, $ID);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();

            $row = $statement->fetch();
            if ($row != null)
            {
                $m = new Motorcycle($row['ID'], $row['Brand'],$row['Name'],$row['Category'],$row['Price'], $row['Color'], $row['Size'], $row['Engine'], $row['Power'], $row['Brakes'], $row['Shifter']);
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