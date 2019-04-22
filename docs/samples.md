### Примеры запросов к МИАЦ

--------------------
findDistrict
--------------------

Поиск участка по названиям адресных объектов

```php
use Miac\Client\RequestOptions\FindDistrictOptions;

$result = $client->findDistrict(new FindDistrictOptions([
    'kladrCode' => '8600001000000',
    'street' => 'УЛ. ИВАНА ЗАХАРОВА',
    'houseNumer' => '23'
]));
```

Поиск участка по базе ФИАС

```php
use Miac\Client\RequestOptions\FindDistrictOptions;

$result = $client->findDistrict(new FindDistrictOptions([
      'addrobjFiasId' => 'f97cca9e-c425-4ad2-aeb2-2b646f805a33',
      'houseFiasId' => 'f97cca9e-c425-4ad2-aeb2-2b646f805a33',
]));
```

--------------------
getActualSpecialistList
--------------------

Получение списка специалистов МО

```php
use Miac\Client\RequestOptions\GetActualSpecialistListOptions;

$result = $client->getActualSpecialistList(new GetActualSpecialistListOptions([
     'muCode' => '19123'
]));
```

--------------------
getMuInfo
--------------------

Получить данные о МО

```php
use Miac\Client\RequestOptions\GetMuInfoOptions;

$result = $client->getMuInfo(new GetMuInfoOptions([
            'muCode' => '19123'
        ]));
```

--------------------
getScheduleInfo
--------------------

Получить данные о расписании

```php
use Miac\Client\RequestOptions\GetScheduleInfoOptions;

$result = $client->getScheduleInfo(new GetScheduleInfoOptions([
         'scheduleDate' => '2019-04-01',
         'muCode' => '19123',
         'needFIO' => true

   ]));
 ```      
--------------------
readFilteredSlotsState
--------------------

Прочитать состояние слотов, удовлетворяющих фильтру

```php
use Miac\Client\RequestOptions\ReadFilteredSlotsStateOptions;

$result = $client->readFilteredSlotState(new ReadFilteredSlotsStateOptions([
    'scheduleDate' => '2019-04-01',
    'muCode' => '19123',
    'deptCode' => '19123',
    'roomNumber' => '1',
    'docCode' => '16067057157',
    'specCode' => '27',
    'positionCode' => '74',
    'scheduleInfo' => '50_1',
    'docFIO' => 'Колташева Александра Сергеевна',
    'docSNILS' => '16067057157',
    'needFIO' => true

]));
 ```  
--------------------
getSlotListByPeriod
--------------------

Получение списка слотов за период

```php
use Miac\Client\RequestOptions\GetSlotListByPeriodOptions;

$result = $client->getSlotListByPeriod(new GetSlotListByPeriodOptions([
        'muCode' => '19123',
        'depCode' => '19123',
        'snils' => '16067057157',
        'profCode' => '16067057157',
        'positionCode' => '74',
        'beginDate' => '2019-03-14',
        'endDate' => '2019-04-03'
  ]));
 ``` 
 
--------------------
changeSlotState
--------------------

Изменить состояние слота

```php
use Miac\Client\RequestOptions\ChangeSlotStateOptions;

$result = $client->changeSlotState(new ChangeSlotStateOptions([
     'Lastname' => 'Иванов',
     'Firstname' => 'Иван',
     'Middlename' => 'Иванович',
     'birthDate' => '2015-01-01',
     'policyNumber' => '74',
     'SNILS' => '12312312412',
     'passportNumber' => '123321',
     'passportSeries' => '1232',
     'phone' => '213125123123',
     'email' => '213125123123',
     'gender' => ChangeSlotStateOptions::GENDER_MALE,
     'GUID' => '1',
     'SlotState' => ChangeSlotStateOptions::STATE_OPEN,
     'status' => ChangeSlotStateOptions::STATUS_ACTIVE,
     'slipNumber' => '1',
     'appointmentSource' => '5',
     'token' => '1',
]));
 ``` 
 
 --------------------
 getAppointmentsBySNILS
 --------------------
 
Получение записей пациента по СНИЛС
 
 ```php
 use Miac\Client\RequestOptions\GetAppointmentsBySNILSOptions;
 
 $result = $client->getAppointmentsBySNILS(new GetAppointmentsBySNILSOptions([
            'snils' => '12956840697'
        ]));
  ``` 