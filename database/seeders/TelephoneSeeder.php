<?php

namespace Database\Seeders;

use App\Models\Telephone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TelephoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $telephones = [
            [
                'branch_id' => 1,
                'contact' => '05288-921254',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 1,
                'contact' => '05822-921181',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 1,
                'contact' => '05822-921365',
                'status' => 'fax',
            ],
            [
                'branch_id' => 2,
                'contact' => '05827-921448',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 2,
                'contact' => '05827-921442',
                'status' => 'fax',
            ],
            [
                'branch_id' => 3,
                'contact' => '05827-923070',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 3,
                'contact' => '05827-923069',
                'status' => 'fax',
            ],
            [
                'branch_id' => 4,
                'contact' => '05827-922664',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 4,
                'contact' => '05822-922665',
                'status' => 'fax',
            ],
            [
                'branch_id' => 5,
                'contact' => '05826-920241',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 5,
                'contact' => '05826-920242',
                'status' => 'fax',
            ],
            [
                'branch_id' => 6,
                'contact' => '05824-920069',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 6,
                'contact' => '05824-920068',
                'status' => 'fax',
            ],
            [
                'branch_id' => 7,
                'contact' => '05826-923062',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 7,
                'contact' => '05826-923063',
                'status' => 'fax',
            ],
            [
                'branch_id' => 8,
                'contact' => '05821-920033',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 8,
                'contact' => '05821-920033',
                'status' => 'fax',
            ],
            [
                'branch_id' => 9,
                'contact' => '05827-922562',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 9,
                'contact' => '05827-922563',
                'status' => 'fax',
            ],
            [
                'branch_id' => 10,
                'contact' => '05823-920103',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 10,
                'contact' => '05823-920104',
                'status' => 'fax',
            ],
            [
                'branch_id' => 11,
                'contact' => '05823-921005',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 11,
                'contact' => '05823-921006',
                'status' => 'fax',
            ],
            [
                'branch_id' => 12,
                'contact' => '05828-920505',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 12,
                'contact' => '05828-920506',
                'status' => 'fax',
            ],
            [
                'branch_id' => 13,
                'contact' => '05825-920010',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 13,
                'contact' => '05825-920009',
                'status' => 'fax',
            ],
            [
                'branch_id' => 14,
                'contact' => '05826-921060',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 14,
                'contact' => '05826-921061',
                'status' => 'fax',
            ],
            [
                'branch_id' => 15,
                'contact' => '05827-920439',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 15,
                'contact' => '05827-920440',
                'status' => 'fax',
            ],
            [
                'branch_id' => 16,
                'contact' => '05824-920233',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 16,
                'contact' => '05824-920234',
                'status' => 'fax',
            ],
            [
                'branch_id' => 17,
                'contact' => '05822-922502',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 17,
                'contact' => '05822-922503',
                'status' => 'fax',
            ],
            [
                'branch_id' => 18,
                'contact' => '05822-920466',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 18,
                'contact' => '05822-442664',
                'status' => 'fax',
            ],
            [
                'branch_id' => 19,
                'contact' => '05822-922302',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 19,
                'contact' => '05822-922303',
                'status' => 'fax',
            ],
            [
                'branch_id' => 20,
                'contact' => '05826-475094',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 20,
                'contact' => '05826-475094',
                'status' => 'fax',
            ],
            [
                'branch_id' => 21,
                'contact' => '05826-921863',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 21,
                'contact' => '05826-921862',
                'status' => 'fax',
            ],
            [
                'branch_id' => 22,
                'contact' => '05822-922003',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 22,
                'contact' => '05822-922002',
                'status' => 'fax',
            ],
            [
                'branch_id' => 23,
                'contact' => '05823-921213',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 23,
                'contact' => '05823-921214',
                'status' => 'fax',
            ],
            [
                'branch_id' => 24,
                'contact' => '05822-922108',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 24,
                'contact' => '05822-922109',
                'status' => 'fax',
            ],
            [
                'branch_id' => 25,
                'contact' => '05824-921027',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 25,
                'contact' => '05824-921028',
                'status' => 'fax',
            ],
            [
                'branch_id' => 26,
                'contact' => '05826-921163',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 26,
                'contact' => '05826-921164',
                'status' => 'fax',
            ],
            [
                'branch_id' => 27,
                'contact' => '05827-922260',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 27,
                'contact' => '05827-922261',
                'status' => 'fax',
            ],
            [
                'branch_id' => 28,
                'contact' => '05822-923126',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 28,
                'contact' => '05822-923127',
                'status' => 'fax',
            ],
            [
                'branch_id' => 29,
                'contact' => '05828-922064',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 29,
                'contact' => '05828-922063',
                'status' => 'fax',
            ],
            [
                'branch_id' => 30,
                'contact' => '05824-920911',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 30,
                'contact' => '05824-920912',
                'status' => 'fax',
            ],
            [
                'branch_id' => 31,
                'contact' => '05826-922361',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 31,
                'contact' => '05826-922362',
                'status' => 'fax',
            ],
            [
                'branch_id' => 32,
                'contact' => '05825-920224',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 32,
                'contact' => '05825-920223',
                'status' => 'fax',
            ],
            [
                'branch_id' => 33,
                'contact' => '05828-922162',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 33,
                'contact' => '05828-922261',
                'status' => 'fax',
            ],
            [
                'branch_id' => 34,
                'contact' => '05822-922631',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 34,
                'contact' => '05822-922632',
                'status' => 'fax',
            ],
            [
                'branch_id' => 35,
                'contact' => '05827-485533',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 35,
                'contact' => '05827-485533',
                'status' => 'fax',
            ],
            [
                'branch_id' => 36,
                'contact' => '05826-922165',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 36,
                'contact' => '05826-922165',
                'status' => 'fax',
            ],
            [
                'branch_id' => 37,
                'contact' => '05822-921826',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 37,
                'contact' => '05822-921826',
                'status' => 'fax',
            ],
            [
                'branch_id' => 38,
                'contact' => '05823-921772',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 38,
                'contact' => '05823-921772',
                'status' => 'fax',
            ],
            [
                'branch_id' => 39,
                'contact' => '05824-921608',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 39,
                'contact' => '05824-921608',
                'status' => 'fax',
            ],
            [
                'branch_id' => 40,
                'contact' => '05822-920043',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 40,
                'contact' => '05822-920043',
                'status' => 'fax',
            ],
            [
                'branch_id' => 41,
                'contact' => '05825-920316',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 41,
                'contact' => '05825-9203167',
                'status' => 'fax',
            ],
            [
                'branch_id' => 42,
                'contact' => '05826-921461',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 42,
                'contact' => '05826-921461',
                'status' => 'fax',
            ],
            [
                'branch_id' => 43,
                'contact' => '05821-920802',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 43,
                'contact' => '05821-920802',
                'status' => 'fax',
            ],
            [
                'branch_id' => 44,
                'contact' => '05826-921865',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 44,
                'contact' => '05826-921865',
                'status' => 'fax',
            ],
            [
                'branch_id' => 45,
                'contact' => '05827-922764',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 45,
                'contact' => '05827-922764',
                'status' => 'fax',
            ],
            [
                'branch_id' => 46,
                'contact' => '05827-920442',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 46,
                'contact' => '05827-920442',
                'status' => 'fax',
            ],
            [
                'branch_id' => 47,
                'contact' => '05827-922564',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 47,
                'contact' => '05827-922564',
                'status' => 'fax',
            ],
            [
                'branch_id' => 48,
                'contact' => '05826-921761',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 48,
                'contact' => '05826-921761',
                'status' => 'fax',
            ],
            [
                'branch_id' => 49,
                'contact' => '05826-471319',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 49,
                'contact' => '05826-471319',
                'status' => 'fax',
            ],
            [
                'branch_id' => 50,
                'contact' => '05824-921313',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 50,
                'contact' => '05824-921313',
                'status' => 'fax',
            ],
            [
                'branch_id' => 51,
                'contact' => '05826-474441',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 51,
                'contact' => '05826-474441',
                'status' => 'fax',
            ],
            [
                'branch_id' => 52,
                'contact' => '05821-920502',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 52,
                'contact' => '05821-920502',
                'status' => 'fax',
            ],
            [
                'branch_id' => 53,
                'contact' => '05822-923007',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 53,
                'contact' => '05822-923008',
                'status' => 'fax',
            ],
            [
                'branch_id' => 54,
                'contact' => '05827-920405',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 54,
                'contact' => '05827-920406',
                'status' => 'fax',
            ],
            [
                'branch_id' => 55,
                'contact' => '05826-923150',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 55,
                'contact' => '05826-923150',
                'status' => 'fax',
            ],
            [
                'branch_id' => 56,
                'contact' => '05824-920545',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 56,
                'contact' => '05824-920544',
                'status' => 'fax',
            ],
            [
                'branch_id' => 57,
                'contact' => '05827-922666',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 57,
                'contact' => '05827-922666',
                'status' => 'fax',
            ],
            [
                'branch_id' => 58,
                'contact' => '05827-923011',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 58,
                'contact' => '05827-923011',
                'status' => 'fax',
            ],
            [
                'branch_id' => 59,
                'contact' => '05330-29731',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 59,
                'contact' => '05330-29731',
                'status' => 'fax',
            ],
            [
                'branch_id' => 60,
                'contact' => '05824-921106',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 60,
                'contact' => '05824-921106',
                'status' => 'fax',
            ],
            [
                'branch_id' => 61,
                'contact' => '05822-920747',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 61,
                'contact' => '05822-920746',
                'status' => 'fax',
            ],
            [
                'branch_id' => 62,
                'contact' => '05822-922514',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 62,
                'contact' => '05822-922514',
                'status' => 'fax',
            ],
            [
                'branch_id' => 63,
                'contact' => '05821-920302',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 63,
                'contact' => '05821-920303',
                'status' => 'fax',
            ],
            [
                'branch_id' => 64,
                'contact' => '05826-923350',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 64,
                'contact' => '05826-923350',
                'status' => 'fax',
            ],
            [
                'branch_id' => 65,
                'contact' => '05826-480649',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 65,
                'contact' => '05826-480649',
                'status' => 'fax',
            ],
            [
                'branch_id' => 66,
                'contact' => '05826-920247',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 66,
                'contact' => '05826-920248',
                'status' => 'fax',
            ],
            [
                'branch_id' => 67,
                'contact' => '05822-923020',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 67,
                'contact' => '05822-923019',
                'status' => 'fax',
            ],
            [
                'branch_id' => 68,
                'contact' => '05825-920715',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 68,
                'contact' => '05825-920716',
                'status' => 'fax',
            ],
            [
                'branch_id' => 69,
                'contact' => '05821-920342',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 69,
                'contact' => '05821-920343',
                'status' => 'fax',
            ],
            [
                'branch_id' => 70,
                'contact' => '0301-3117420',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 71,
                'contact' => '0315-3191313',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 72,
                'contact' => '0345-5939806',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 73,
                'contact' => '05828-922165-66',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 74,
                'contact' => '0346-5463091',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 75,
                'contact' => '05826-922045-46',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 76,
                'contact' => '05826-922045-46',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 77,
                'contact' => '05822-920862',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 78,
                'contact' => '05828-922068',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 79,
                'contact' => '05827-920079',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 79,
                'contact' => '05827-940751',
                'status' => 'fax',
            ],
            [
                'branch_id' => 80,
                'contact' => '05827-922448',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 80,
                'contact' => '05827-922449',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 81,
                'contact' => '05827-922654',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 81,
                'contact' => '05827-922656',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 82,
                'contact' => '05826-940820',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 83,
                'contact' => '05824-920040',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 83,
                'contact' => '05824-920049',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 84,
                'contact' => '05822-922867',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 84,
                'contact' => '05822-922865',
                'status' => 'telephone_no',
            ],
            [
                'branch_id' => 85,
                'contact' => '05822-923021',
                'status' => 'telephone_no',
            ],
        ];

        foreach ($telephones as $telephone) {
            Telephone::create($telephone);
        }

    }
}
