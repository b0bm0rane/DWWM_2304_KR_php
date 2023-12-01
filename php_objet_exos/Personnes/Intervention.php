<?php

require_once("Client.php");
require_once("Intervenant.php");

class Intervention
{
    public Client $client;
    public Intervenant $intervenant;
    public string $dateIntervention;
    public string $hourIntervention;
    public string $description;

    public function __construct(Client $client, Intervenant $intervenant, string $dateIntervention, string $hourIntervention, string $description)
    {
        $this->client = $client;
        $this->intervenant = $intervenant;
        $this->dateIntervention = $dateIntervention;
        $this->hourIntervention = $hourIntervention;
        $this->description = $description;
    }

    public function getClient() : Client
    {
        return $this->client;
    }

    public function getIntervenant() : Intervenant
    {
        return $this->intervenant;
    }

    public function getDate() : string
    {
        return $this->dateIntervention;
    }
    public function getHour() : string
    {
        return $this->hourIntervention;
    }
    public function getDescription() : string
    {
        return $this->description;
    }
}

$wc = new Intervention($natana, $florian, "2023-12-01", "08-00", "WC bouché");

echo "<br>";
$wc->getClient();
echo "<br>";
$wc->getIntervenant();
echo "<br>";
echo $wc->getDate();
echo "<br>";
echo $wc->getHour();
echo "<br>";
echo $wc->getDescription();
echo "<br>";
var_dump($wc);
echo "<br>";
echo "<br>";
