<?php

require_once("./Voiture.php");
require_once("./Moteur.php");

class VoitureDeCourse extends Voiture
{
    public function __construct(string $brand, string $model, int $weight, $motor)
    {    try    {
                    if($this->motorOk($brand, $motor->brand)){
                        parent::__construct($brand, $model, $weight, $motor);
                    }

                    else{
                        throw new Exception("Alerte moteur ! Contrefaçon détectée! ");
                    }
            
                }

            catch (Exception $e) {
                echo $e->getMessage();
            }
    }
    public function motorOk(string $carBrand, string $motorBrand) : bool
    {
        if($carBrand == $motorBrand){
            return true;
        }
        else{
           return false;
        }
    }

    public function getMaxSpeed() : float
    {
        $this->maxSpeed = $this->motor->maxSpeed - ($this->weight * 5 / 100);
        return $this->maxSpeed;
    }
}

$peugeotCourse = new VoitureDeCourse("Peugeot", "9X8", 1030, new Moteur("Peugeot", 400));

echo"<br>";
echo "Voiture : 9X8";
echo"<br>";

echo $peugeotCourse->getBrand();
echo"<br>";

echo $peugeotCourse->getModel();
echo"<br>";

echo $peugeotCourse->getWeight() . " kg";
echo"<br>";

echo $peugeotCourse->getMaxSpeed() . " KmH";
echo"<br>";
echo"<br>";

echo "Moteur : ";
echo "<br>";

echo $peugeotCourse->getMotorBrand();
echo"<br>";

echo $peugeotCourse->getMotorMaxSpeed() . " KmH";
echo"<br>";
echo"<br>";

var_dump($peugeotCourse);
echo"<br>";
echo"<br>";
