<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Практическая работа № 12</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php 
    $surname = ['Иванов', 'Петрова', 'Сидоров', 'Гришина'];
    $name = ['Иван', 'Надежда', 'Матвей', 'Алена'];
    $patronomic = ['Иванович', 'Дмитриевна', 'Олегович', 'Максимовна'];

function getFullnameFromParts ($surname, $name, $patronomic) {
    $fullname = $surname . ' ' . $name . ' ' . $patronomic;
    return($fullname);
}
echo getFullnameFromParts ($surname [0], $name[0], $patronomic[0]);
echo '<br>';
echo getFullnameFromParts ($surname [1], $name[1], $patronomic[1]);
echo '<br>';
echo getFullnameFromParts ($surname [2], $name[2], $patronomic[2]);
echo '<br>';
echo getFullnameFromParts ($surname [3], $name[3], $patronomic[3]);
echo '<br>';

$full = ['Иванов Иван Иванович', 'Дмитриева Надежда Дмитриевна', 'Павлов Павел Павлович','Сидорова Мария Геннадьевна'];
function getPartsFromFullname ($full) {
    for ($i = 0; $i < count($full); $i++) {
        $only = explode(" ", $full[$i]);
        $surname1 = $only [0];
        $name1 = $only [1];
        $patronomic1 = $only [2];
        echo $surname1 . '<br>';
        echo $name1. '<br>';
        echo $patronomic1. '<br>';
    }
    

}
echo (getPartsFromFullname ($full));

function getShortName ($full) {
    for ($i = 0; $i < count($full); $i++) {
    $words = explode(" ", $full[$i]);
    echo $words[1] . ' ' . substr($words[0],0,2) . '.'. '<br>' ;

    }}
    
echo (getShortName($full));


function getGenderFromName ($full) 
{
    $name = getPartsFromFullname($full);
    $genderCounter = 0;
    $gender="";

    if (mb_substr($name['patronomic1'], -3, 3) == 'вна')
    {
        $genderCounter -= 1;
    }

    if (mb_substr($name['name1'], -1, 1) == 'а') 
    {
        $genderCounter -= 1;
    }

    if (mb_substr($name['surname1'], -2, 2) == 'ва') 
    {    
        $genderCounter -= 1;
    }

    if (mb_substr($name['patronomic1'], -2, 2) == 'ич') 
    {
        $genderCounter += 1;
    }

    if (mb_substr($name['name1'], -1, 1) === ('й'||'н')) 
    {
        $genderCounter += 1;        
    }

    if (mb_substr($name['surname1'], -1, 1) == 'в') 
    {
        $genderCounter += 1;
    }
    
    if ($genderCounter > 0)
    {
        $gender = "Мужской пол";
        echo $gender;
        //return "Мужской пол";
    } else if ($genderCounter == 0)
    {
        $gender = "Неопределенный пол";
        echo $gender;
        //return "Неопределенный пол";
    } else
    {
        $gender = "Женский пол";
        echo $gender;
        //return "Женский пол";
    }; 
    return $gender;    
}

echo getGenderFromName ($full);

$example_persons_array = [
    [
        'fullname' => 'Иванов Иван Иванович',
        'job' => 'tester',
    ],
    [
        'fullname' => 'Степанова Наталья Степановна',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Пащенко Владимир Александрович',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Громов Александр Иванович',
        'job' => 'fullstack-developer',
    ],
    [
        'fullname' => 'Славин Семён Сергеевич',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Цой Владимир Антонович',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Быстрая Юлия Сергеевна',
        'job' => 'PR-manager',
    ],
    [
        'fullname' => 'Шматко Антонина Сергеевна',
        'job' => 'HR-manager',
    ],
    [
        'fullname' => 'аль-Хорезми Мухаммад ибн-Муса',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Бардо Жаклин Фёдоровна',
        'job' => 'android-developer',
    ],
    [
        'fullname' => 'Шварцнегер Арнольд Густавович',
        'job' => 'babysitter',
    ],
];

function getGenderDescription ($arr) 
{
    
    foreach ($arr as $key => &$value) {
    $value = getGenderFromName ($arr[$key]['fullname']);
    };
    
 
    $men = array_filter($arr, function($number) {
    return $number == 'Мужской пол';});

	$women = array_filter($arr, function($number) {
    return $number == 'Женский пол';});

	$other = array_filter($arr, function($number) {
    return $number == 'Неопределенный пол';});

    
	$menPercent = round(count($men) / count($arr) * 100, 1);
	$womenPercent = round(count($women) / count($arr) * 100, 1);
	$otherPercent = round(count($other) / count($arr) * 100, 1);
	
    
	echo "Гендерный состав аудитории:
---------------------------
Мужчины - $menPercent%
Женщины - $womenPercent%
Не удалось определить - $otherPercent%;";
}





?>

</body>
</html>