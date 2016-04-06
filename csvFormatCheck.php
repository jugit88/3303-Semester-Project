<?PHP
$requiredHeaders = array('session_id', `Rtc Date`, `Rtc Time`,
`BMP Temp(C)`, `BMP Pres(mb)`, `SHT25 Temp(C)`, `SHT25 Humidity`,
`CO2(ADC VAL)`, `Wind Speed(mph)`, `Wind Direction(deg)`,
`Quad-Aux-1(microVolts)`, `Quad-Main-1(microVolts)`,
`Quad-Aux-2(microVolts)`, `Quad-Main-2(microVolts)`,
`Quad-Aux-3(microVolts)`, `Quad-Main-3(microVolts)`,
`Quad-Aux-4(microVolts)`, `Quad-Main-4(microVolts)`,
`Fig 210 Heat(milliVolts)`, `Fig 210 Sens(milliVolts)`,
`Fig 280 Heat(milliVolts)`, `Fig 280 Sens(milliVolts)`,
`BL Moccon sens(milliVolts)`, `E2VO3 Heat(milliVolts)`,
`E2VO3 Sens(milliVolts)`, `GPS Date`, `GPS Time(UTC)`, `Latitude`,
`Longitude`, `Fix Quality`, `Altitude(meters above sea level)`, `Statellites`); //headers we expect

$f = fopen($file, 'r');
$firstLine = fgets($f); //get first line of csv file
fclose($f)

$foundHeaders = str_getcsv(trim($firstLine), ',', '"'); //parse to array

if ($foundHeaders !== $requiredHeaders) {
   echo 'Headers do not match: '.implode(', ', $foundHeaders);
   die();
}
?>