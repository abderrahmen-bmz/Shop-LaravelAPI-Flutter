<?php

namespace App\Http\Controllers;

use App\Unit;

//use App\Http\Controllers\DB;
//use Illuminate\Http\Request;

class DataImportController extends Controller
{
    public function import()
    {

        $units = [
            "AS"    => "Assortment",
            "BG"    => "Bag",
            "BA"    => "Bale",
            "BI"    => "Bar",
            "BR"    => "Barrel",
            "BL"    => "Block",
            "B8"    => "Board",
            "BF"    => "Board Feet",
            "BO" =>    "Bottle",
            "BX" =>    "Box",
            "BN" =>    "Bulk",
            "BD" =>    "Bundle",
            "BU" =>    "Bushel",
            "CN" =>    "Can",
            "CG" =>    "Card",
            "CT" =>    "Carton",
            "CQ" =>    "Cartridge",
            "CA" =>    "Case",
            "C3" =>    "Centigram",
            "CM" =>    "Centiliter",
            "1N" =>    "Count",
            "CV"    => "Cover",
            "CC"    => "Cubic Centimeter",
            "C8"    => "Cubic Decimeter",
            "CF"    => "Cubic Feet",
            "CI"    => "Cubic Inches",
            "CR"    => "Cubic Meter",
            "CO"    => "Cubic Meters",
            "MMQ"   => "Cubic Milimetre",
            "CU"    => "Cup",
            "DA"    => "Days",
            "DG"    => "Decigram",
            "DL"    => "Deciliter",
            "DM"    => "Decimeter",
            "CE"    => "Degrees Celsius (Centigrade)",
            "FA"    => "Degrees Fahrenheit",
            "DS"    => "Display",
            "DO"    => "Dollars, US",
            "DZ"    => "Dozen",
            "DR"    => "Drum",
            "EA"    => "Each",
            "EV"    => "Envelope",
            "FT"    => "Feet",
            "UZ"    => "Fifty Count",
            "UY"    => "Fifty Square Feet",
            "FO"    => "Fluid Ounce",
            "GA"    => "Gallon",
            "GR" =>    "Gram",
            "GT" =>    "Gross Kilogram",
            "HD" =>    "Half Dozen",
            "HC" =>    "Houndred Count",
            "HL" =>    "Houndred Feet",
            "CW" =>    "Houndred Pounds (CWT)",
            "IN" =>    "Inches",
            "JR" =>    "Jar",
            "KE" =>    "Keg",
            "KG" =>    "Kilogram",
            "DK" =>    "Kilometer",
            "KT" =>    "Kit",
            "LR" =>    "Layer(s)",
            "LF" =>    "Linear Foot",
            "LM" =>    "Linear Meter",
            "LK" =>    "Link",
            "LT" =>    "Liter",
            "MR" =>    "Meter",
            "MP" =>    "Metric Ton",
            "MC" =>    "Microgram",
            "4G" =>    "Microliter",
            "ME" =>    "Miligram",
            "ML" =>    "Mililiter",
            "MM" =>    "Milimeter",
            "MX" =>    "Mod Pallet (Mixed)",
            "58" =>    "Net Kilograms",
            "OZ" =>    "Ounces",
            "PH" =>    "Pack",
            "PK"    => "Pack",
            "PA"    => "Pail",
            "PR"    => "Pair",
            "PL"    => "Pallet",
            "PY"    => "Peck",
            "P1"    => "Percent",
            "PC"    => "Piece",
            "PT"    => "Pint",
            "PTN"   => "Portion",
            "V2"    => "Pouch",
            "LB"    => "Pounds",
            "PE"    => "Pounds Equivalent",
            "PG"    => "Pounds Gross",
            "PN"    => "Pounds Net",
            "QT"    => "Quart",
            "QS"    => "Quart, Dry",
            "RL"    => "Roll",
            "ST"    => "Set",
            "SH"    => "Sheet",
            "SX"    => "Shipment",
            "FJ"    => "Sizing Factor",
            "SF"    => "Square Foot",
            "SM"    => "Square Meter",
            "SY"    => "Square Yard",
            "15"    => "Stick",
            "TK"    => "Tank",
            "TM"    => "Thousand Feet",
            "TE"    => "Tote",
            "NT"    => "Trailer",
            "TY"    => "Tray",
            "Z25"   => "Usage",
            "UN"    => "Unit",
            "YD"    => "Yard",
        ];

        // foreach($units as $key => $value) { 
        // \DB::table('units')->insert([
        //   'unit_code' => $key,
        //   'unit_name' => $value,
        // ]);
        // }

        
        foreach($units as $key => $value) { 
            $unit = new Unit();
            $unit->unit_code = $key;
            $unit->unit_name = $value;
            $unit->save();
            
            }

            echo 'Finished';
    }
}
