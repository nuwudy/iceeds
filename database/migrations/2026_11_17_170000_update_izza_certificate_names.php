<?php

use App\Models\Certificate;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $updates = array (
  0 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/806',
    'student_name' => 'RIYAS MUHAMMED',
    'first_name' => 'RIYAS',
    'last_name' => 'MUHAMMED',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  1 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/807',
    'student_name' => 'JAYANANDAN R',
    'first_name' => 'JAYANANDAN',
    'last_name' => 'R',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  2 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/808',
    'student_name' => 'SUHAIL T I',
    'first_name' => 'SUHAIL T',
    'last_name' => 'I',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  3 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/809',
    'student_name' => 'MOHAMMED SHABITH K',
    'first_name' => 'MOHAMMED SHABITH',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  4 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/810',
    'student_name' => 'SAIFUDHEEN C',
    'first_name' => 'SAIFUDHEEN',
    'last_name' => 'C',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  5 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/811',
    'student_name' => 'MUHAMMAD RAMSHAD M',
    'first_name' => 'MUHAMMAD RAMSHAD',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  6 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/812',
    'student_name' => 'MUHAMMED MANSOOR O K',
    'first_name' => 'MUHAMMED MANSOOR O',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  7 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/813',
    'student_name' => 'ABDURASHID P',
    'first_name' => 'ABDURASHID',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  8 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/814',
    'student_name' => 'ABDULLA KUTTY K A',
    'first_name' => 'ABDULLA KUTTY K',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  9 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/815',
    'student_name' => 'MUSTHAFA P',
    'first_name' => 'MUSTHAFA',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  10 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/816',
    'student_name' => 'KABEER A',
    'first_name' => 'KABEER',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  11 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/817',
    'student_name' => 'SUHAIL A',
    'first_name' => 'SUHAIL',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  12 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/818',
    'student_name' => 'SHAMIL MOHAMMED SHEREEF',
    'first_name' => 'SHAMIL MOHAMMED',
    'last_name' => 'SHEREEF',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  13 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/819',
    'student_name' => 'MUHAMMED FAROOK C M',
    'first_name' => 'MUHAMMED FAROOK C',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  14 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/820',
    'student_name' => 'AHAMMED NUHMAN P K',
    'first_name' => 'AHAMMED NUHMAN P',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  15 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/821',
    'student_name' => 'ALEN SHAH RAFI',
    'first_name' => 'ALEN SHAH',
    'last_name' => 'RAFI',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  16 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/822',
    'student_name' => 'MOHAMMED SAVAD T C',
    'first_name' => 'MOHAMMED SAVAD T',
    'last_name' => 'C',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  17 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/823',
    'student_name' => 'ANVARUDHEEN K K',
    'first_name' => 'ANVARUDHEEN K',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  18 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/824',
    'student_name' => 'REEMAMOLE A U',
    'first_name' => 'REEMAMOLE A',
    'last_name' => 'U',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  19 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/825',
    'student_name' => 'JAISHA JALAL',
    'first_name' => 'JAISHA',
    'last_name' => 'JALAL',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  20 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/826',
    'student_name' => 'NAEEMA MUHAMMED',
    'first_name' => 'NAEEMA',
    'last_name' => 'MUHAMMED',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  21 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/827',
    'student_name' => 'CHINCHU S R',
    'first_name' => 'CHINCHU S',
    'last_name' => 'R',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  22 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/828',
    'student_name' => 'HUSNA SHARIN K',
    'first_name' => 'HUSNA SHARIN',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  23 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/829',
    'student_name' => 'SHAHANA',
    'first_name' => 'SHAHANA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  24 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/830',
    'student_name' => 'RAMYA M R',
    'first_name' => 'RAMYA M',
    'last_name' => 'R',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  25 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/831',
    'student_name' => 'TINTU VARGHESE',
    'first_name' => 'TINTU',
    'last_name' => 'VARGHESE',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  26 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/832',
    'student_name' => 'THAHIRA M',
    'first_name' => 'THAHIRA',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  27 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/833',
    'student_name' => 'RAMSY P A',
    'first_name' => 'RAMSY P',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  28 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/834',
    'student_name' => 'SEJEENA T A',
    'first_name' => 'SEJEENA T',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  29 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/835',
    'student_name' => 'JAMEELA V P',
    'first_name' => 'JAMEELA V',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  30 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/836',
    'student_name' => 'KADEEJA M K',
    'first_name' => 'KADEEJA M',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  31 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/837',
    'student_name' => 'SUNEERA K',
    'first_name' => 'SUNEERA',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  32 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/838',
    'student_name' => 'SAJMI O S',
    'first_name' => 'SAJMI O',
    'last_name' => 'S',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  33 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/839',
    'student_name' => 'NISHA S',
    'first_name' => 'NISHA',
    'last_name' => 'S',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  34 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/840',
    'student_name' => 'KADEEJA',
    'first_name' => 'KADEEJA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  35 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/841',
    'student_name' => 'SULFATH P S',
    'first_name' => 'SULFATH P',
    'last_name' => 'S',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  36 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/842',
    'student_name' => 'NISHIDHA',
    'first_name' => 'NISHIDHA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  37 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/843',
    'student_name' => 'HALEEMA A R',
    'first_name' => 'HALEEMA A',
    'last_name' => 'R',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  38 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/844',
    'student_name' => 'MUHAMMED SAFWAN V',
    'first_name' => 'MUHAMMED SAFWAN',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  39 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/845',
    'student_name' => 'MUHAMMED ANAS',
    'first_name' => 'MUHAMMED',
    'last_name' => 'ANAS',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  40 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/846',
    'student_name' => 'ABDUL RASHEED K P',
    'first_name' => 'ABDUL RASHEED K',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  41 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/847',
    'student_name' => 'ABDUL VAHID KOYA THANGAL V C',
    'first_name' => 'ABDUL VAHID KOYA THANGAL V',
    'last_name' => 'C',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  42 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/848',
    'student_name' => 'SHAJI V K',
    'first_name' => 'SHAJI V',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  43 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/849',
    'student_name' => 'MOHAMED ABDUL KADER',
    'first_name' => 'MOHAMED ABDUL',
    'last_name' => 'KADER',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  44 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/850',
    'student_name' => 'NAJMUDHEEN K A',
    'first_name' => 'NAJMUDHEEN K',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  45 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/851',
    'student_name' => 'UMAR FAROOQUE C T',
    'first_name' => 'UMAR FAROOQUE C',
    'last_name' => 'T',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  46 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/852',
    'student_name' => 'MOHAMMED HANEEF C M',
    'first_name' => 'MOHAMMED HANEEF C',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  47 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/853',
    'student_name' => 'MUHAMMAD ASHIQUE',
    'first_name' => 'MUHAMMAD',
    'last_name' => 'ASHIQUE',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  48 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/854',
    'student_name' => 'NIZAMUDEEN A',
    'first_name' => 'NIZAMUDEEN',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  49 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/855',
    'student_name' => 'FAZIL MUKRI ANGILLATH',
    'first_name' => 'FAZIL MUKRI',
    'last_name' => 'ANGILLATH',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  50 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/856',
    'student_name' => 'MUHAMMED IRSHAD K',
    'first_name' => 'MUHAMMED IRSHAD',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  51 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/857',
    'student_name' => 'MUHAMMED SAFAR A',
    'first_name' => 'MUHAMMED SAFAR',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  52 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/858',
    'student_name' => 'UMMAR FAROOK A K',
    'first_name' => 'UMMAR FAROOK A',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  53 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/859',
    'student_name' => 'PRADOSH KUMAR CHEMBRA',
    'first_name' => 'PRADOSH KUMAR',
    'last_name' => 'CHEMBRA',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  54 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/860',
    'student_name' => 'FATHIMA SANA C P',
    'first_name' => 'FATHIMA SANA C',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  55 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/861',
    'student_name' => 'RUSNA FAIZANA M K',
    'first_name' => 'RUSNA FAIZANA M',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  56 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/862',
    'student_name' => 'SHAHINA P T',
    'first_name' => 'SHAHINA P',
    'last_name' => 'T',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  57 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/863',
    'student_name' => 'HASEEBA P',
    'first_name' => 'HASEEBA',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  58 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/864',
    'student_name' => 'KADEEJA P V',
    'first_name' => 'KADEEJA P',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  59 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/865',
    'student_name' => 'SHEBITHA P U',
    'first_name' => 'SHEBITHA P',
    'last_name' => 'U',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  60 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/866',
    'student_name' => 'AFRA M',
    'first_name' => 'AFRA',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  61 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/867',
    'student_name' => 'AMINA NAJA',
    'first_name' => 'AMINA',
    'last_name' => 'NAJA',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  62 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/868',
    'student_name' => 'RAMLETH N N',
    'first_name' => 'RAMLETH N',
    'last_name' => 'N',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  63 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/869',
    'student_name' => 'ASNA P V',
    'first_name' => 'ASNA P',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  64 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/870',
    'student_name' => 'AYISA SABNA K T',
    'first_name' => 'AYISA SABNA K',
    'last_name' => 'T',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  65 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/871',
    'student_name' => 'NAJMA P T',
    'first_name' => 'NAJMA P',
    'last_name' => 'T',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  66 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/872',
    'student_name' => 'LISHNA C',
    'first_name' => 'LISHNA',
    'last_name' => 'C',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  67 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/873',
    'student_name' => 'RAFIYA N P C',
    'first_name' => 'RAFIYA N P',
    'last_name' => 'C',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  68 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/874',
    'student_name' => 'NAJIYA BEEGUM T P',
    'first_name' => 'NAJIYA BEEGUM T',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  69 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/875',
    'student_name' => 'NAFIYA BEEGAM T P',
    'first_name' => 'NAFIYA BEEGAM T',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  70 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/876',
    'student_name' => 'B HAJRA',
    'first_name' => 'B',
    'last_name' => 'HAJRA',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  71 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/877',
    'student_name' => 'RASHA RAHMAN C P',
    'first_name' => 'RASHA RAHMAN C',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  72 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/878',
    'student_name' => 'FOUSIYA T I',
    'first_name' => 'FOUSIYA T',
    'last_name' => 'I',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  73 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/879',
    'student_name' => 'SHABANA P S',
    'first_name' => 'SHABANA P',
    'last_name' => 'S',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  74 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/880',
    'student_name' => 'SHUHAIMA P V',
    'first_name' => 'SHUHAIMA P',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  75 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/881',
    'student_name' => 'RAMSEENA M',
    'first_name' => 'RAMSEENA',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  76 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/882',
    'student_name' => 'ABDUL KABEER P',
    'first_name' => 'ABDUL KABEER',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  77 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/883',
    'student_name' => 'ABDUL JABBAR',
    'first_name' => 'ABDUL',
    'last_name' => 'JABBAR',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  78 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/884',
    'student_name' => 'ABDUL JALEEL',
    'first_name' => 'ABDUL',
    'last_name' => 'JALEEL',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  79 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/885',
    'student_name' => 'ABDUL RASHEED',
    'first_name' => 'ABDUL',
    'last_name' => 'RASHEED',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  80 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/886',
    'student_name' => 'ANISUDDEEN SHIBILI M M',
    'first_name' => 'ANISUDDEEN SHIBILI M',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  81 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/887',
    'student_name' => 'ASHFAK AHAMMED T S',
    'first_name' => 'ASHFAK AHAMMED T',
    'last_name' => 'S',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  82 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/888',
    'student_name' => 'FIRDOUSE P S',
    'first_name' => 'FIRDOUSE P',
    'last_name' => 'S',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  83 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/889',
    'student_name' => 'JAFAR SADIK',
    'first_name' => 'JAFAR',
    'last_name' => 'SADIK',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  84 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/890',
    'student_name' => 'JOY T F',
    'first_name' => 'JOY T',
    'last_name' => 'F',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  85 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/891',
    'student_name' => 'JUNAID',
    'first_name' => 'JUNAID',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  86 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/892',
    'student_name' => 'MOHAMED JUNAIS K',
    'first_name' => 'MOHAMED JUNAIS',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  87 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/893',
    'student_name' => 'MUHAMMED LIBAN',
    'first_name' => 'MUHAMMED',
    'last_name' => 'LIBAN',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  88 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/894',
    'student_name' => 'MOHAMMED NOUSHAD K M',
    'first_name' => 'MOHAMMED NOUSHAD K',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  89 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/895',
    'student_name' => 'MUHAMMED SWAFVAN',
    'first_name' => 'MUHAMMED',
    'last_name' => 'SWAFVAN',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  90 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/896',
    'student_name' => 'MUHAMMED SALIH P K',
    'first_name' => 'MUHAMMED SALIH P',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  91 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/897',
    'student_name' => 'MOHAMMED SHAFI',
    'first_name' => 'MOHAMMED',
    'last_name' => 'SHAFI',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  92 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/898',
    'student_name' => 'MUHAMMED UNAIS E K',
    'first_name' => 'MUHAMMED UNAIS E',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  93 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/899',
    'student_name' => 'NOUFAL ANVAARI',
    'first_name' => 'NOUFAL',
    'last_name' => 'ANVAARI',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  94 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/900',
    'student_name' => 'SAYYED MOHAMED ANSHAF P M P',
    'first_name' => 'SAYYED MOHAMED ANSHAF P M',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  95 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/901',
    'student_name' => 'SAYYED IBRAHIM BADISH',
    'first_name' => 'SAYYED IBRAHIM',
    'last_name' => 'BADISH',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  96 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/902',
    'student_name' => 'SHIYAS P P',
    'first_name' => 'SHIYAS P',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  97 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/903',
    'student_name' => 'SUHAIB C P',
    'first_name' => 'SUHAIB C',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  98 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/904',
    'student_name' => 'AKHILA M K',
    'first_name' => 'AKHILA M',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  99 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/905',
    'student_name' => 'ARIFA HASHIM K P',
    'first_name' => 'ARIFA HASHIM K',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  100 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/906',
    'student_name' => 'CHITRA HARIDAS',
    'first_name' => 'CHITRA',
    'last_name' => 'HARIDAS',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  101 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/907',
    'student_name' => 'FAHEEMA KHALEEL',
    'first_name' => 'FAHEEMA',
    'last_name' => 'KHALEEL',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  102 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/908',
    'student_name' => 'FARSHANA K',
    'first_name' => 'FARSHANA',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  103 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/909',
    'student_name' => 'FATHIMA THASNEEM P',
    'first_name' => 'FATHIMA THASNEEM',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  104 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/910',
    'student_name' => 'GEETHA P',
    'first_name' => 'GEETHA',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  105 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/911',
    'student_name' => 'JASMIN K C',
    'first_name' => 'JASMIN K',
    'last_name' => 'C',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  106 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/912',
    'student_name' => 'MUMTHAS',
    'first_name' => 'MUMTHAS',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  107 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/913',
    'student_name' => 'NASEEJA RAMEES',
    'first_name' => 'NASEEJA',
    'last_name' => 'RAMEES',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  108 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/914',
    'student_name' => 'NASEERA V P K',
    'first_name' => 'NASEERA V P',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  109 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/915',
    'student_name' => 'RAJITHA M P',
    'first_name' => 'RAJITHA M',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  110 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/916',
    'student_name' => 'RAHNA JASEEM',
    'first_name' => 'RAHNA',
    'last_name' => 'JASEEM',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  111 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/917',
    'student_name' => 'RAMSHEENA M P',
    'first_name' => 'RAMSHEENA M',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  112 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/918',
    'student_name' => 'RASHEEDA',
    'first_name' => 'RASHEEDA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  113 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/919',
    'student_name' => 'RINCE JOE MARIA',
    'first_name' => 'RINCE JOE',
    'last_name' => 'MARIA',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  114 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/920',
    'student_name' => 'RUSHDA',
    'first_name' => 'RUSHDA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  115 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/921',
    'student_name' => 'SAFEEDA MOL K',
    'first_name' => 'SAFEEDA MOL',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  116 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/922',
    'student_name' => 'SAHLA FARSANA',
    'first_name' => 'SAHLA',
    'last_name' => 'FARSANA',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  117 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/923',
    'student_name' => 'SHAHALA',
    'first_name' => 'SHAHALA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  118 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/924',
    'student_name' => 'SHAREEFA K',
    'first_name' => 'SHAREEFA',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  119 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/925',
    'student_name' => 'SHIBUNA SHERIN T P',
    'first_name' => 'SHIBUNA SHERIN T',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  120 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/926',
    'student_name' => 'SUNAIDA',
    'first_name' => 'SUNAIDA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  121 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/927',
    'student_name' => 'THABSHEERA YASMIN',
    'first_name' => 'THABSHEERA',
    'last_name' => 'YASMIN',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  122 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/928',
    'student_name' => 'HUSNA V P',
    'first_name' => 'HUSNA V',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  123 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/929',
    'student_name' => 'HASEENA M M',
    'first_name' => 'HASEENA M',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  124 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/930',
    'student_name' => 'JASMIN K A',
    'first_name' => 'JASMIN K',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  125 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/931',
    'student_name' => 'RASIA V A',
    'first_name' => 'RASIA V',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  126 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/932',
    'student_name' => 'MAHAMMAD MUSTHAFA V H',
    'first_name' => 'MAHAMMAD MUSTHAFA V',
    'last_name' => 'H',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  127 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/933',
    'student_name' => 'ABDURAHIMAN',
    'first_name' => 'ABDURAHIMAN',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  128 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/934',
    'student_name' => 'A NAVAZ',
    'first_name' => 'A',
    'last_name' => 'NAVAZ',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  129 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/935',
    'student_name' => 'JUBAIR',
    'first_name' => 'JUBAIR',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  130 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/936',
    'student_name' => 'T P ANAS KAUZARY',
    'first_name' => 'T P ANAS',
    'last_name' => 'KAUZARY',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  131 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/937',
    'student_name' => 'ABDUL SALAM E P',
    'first_name' => 'ABDUL SALAM E',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  132 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/938',
    'student_name' => 'YOOSUF SIDHIQ V',
    'first_name' => 'YOOSUF SIDHIQ',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  133 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/939',
    'student_name' => 'AZHARUDHEEN CHATHURALA',
    'first_name' => 'AZHARUDHEEN',
    'last_name' => 'CHATHURALA',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  134 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/940',
    'student_name' => 'THAJUDEEN',
    'first_name' => 'THAJUDEEN',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  135 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/941',
    'student_name' => 'MUHAMMAD AFTHABU RAHMAN K',
    'first_name' => 'MUHAMMAD AFTHABU RAHMAN',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  136 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/942',
    'student_name' => 'SHIYAS',
    'first_name' => 'SHIYAS',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  137 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/943',
    'student_name' => 'MOHAMMED HANEEFA T K',
    'first_name' => 'MOHAMMED HANEEFA T',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  138 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/944',
    'student_name' => 'MUHAMMAD SHAFEEQUE K',
    'first_name' => 'MUHAMMAD SHAFEEQUE',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  139 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/945',
    'student_name' => 'MUHAMMAD HUSSAIN',
    'first_name' => 'MUHAMMAD',
    'last_name' => 'HUSSAIN',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  140 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/946',
    'student_name' => 'SOUDA K',
    'first_name' => 'SOUDA',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  141 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/947',
    'student_name' => 'NASEERA C M',
    'first_name' => 'NASEERA C',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  142 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/948',
    'student_name' => 'ASNA THARAVATTATH',
    'first_name' => 'ASNA',
    'last_name' => 'THARAVATTATH',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  143 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/949',
    'student_name' => 'HUDA',
    'first_name' => 'HUDA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  144 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/950',
    'student_name' => 'BUSHRA E',
    'first_name' => 'BUSHRA',
    'last_name' => 'E',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  145 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/951',
    'student_name' => 'SHIFANA SERI',
    'first_name' => 'SHIFANA',
    'last_name' => 'SERI',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  146 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/952',
    'student_name' => 'SAMHA T A',
    'first_name' => 'SAMHA T',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  147 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/953',
    'student_name' => 'SEMEEMA MARJANA K',
    'first_name' => 'SEMEEMA MARJANA',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  148 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/954',
    'student_name' => 'DR FATHIMATH SAHLA BEEGAM D M',
    'first_name' => 'DR FATHIMATH SAHLA BEEGAM D',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  149 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/955',
    'student_name' => 'JAMSHEENA V S',
    'first_name' => 'JAMSHEENA V',
    'last_name' => 'S',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  150 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/956',
    'student_name' => 'REENA K P',
    'first_name' => 'REENA K',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  151 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/957',
    'student_name' => 'SHEEJA P K',
    'first_name' => 'SHEEJA P',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  152 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/958',
    'student_name' => 'SHAMNA',
    'first_name' => 'SHAMNA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  153 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/959',
    'student_name' => 'SAJITHA P',
    'first_name' => 'SAJITHA',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  154 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/960',
    'student_name' => 'HASNA E M',
    'first_name' => 'HASNA E',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  155 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/961',
    'student_name' => 'HAMNA K H',
    'first_name' => 'HAMNA K',
    'last_name' => 'H',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  156 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/962',
    'student_name' => 'SAFEENA',
    'first_name' => 'SAFEENA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  157 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/963',
    'student_name' => 'OMANA N C',
    'first_name' => 'OMANA N',
    'last_name' => 'C',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  158 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/964',
    'student_name' => 'SONA M',
    'first_name' => 'SONA',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  159 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/965',
    'student_name' => 'ROMJITH ANTONY',
    'first_name' => 'ROMJITH',
    'last_name' => 'ANTONY',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  160 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/967',
    'student_name' => 'MUHAMMAD SAVAD K A',
    'first_name' => 'MUHAMMAD SAVAD K',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  161 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/968',
    'student_name' => 'HAMEED O K',
    'first_name' => 'HAMEED O',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  162 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/969',
    'student_name' => 'MUHAMMED NABEEL P P',
    'first_name' => 'MUHAMMED NABEEL P',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  163 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/970',
    'student_name' => 'ABDUL JALEEL',
    'first_name' => 'ABDUL',
    'last_name' => 'JALEEL',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  164 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/971',
    'student_name' => 'MUHAMMED HASHIM',
    'first_name' => 'MUHAMMED',
    'last_name' => 'HASHIM',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  165 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/972',
    'student_name' => 'MAHAMMAD ASHRAF',
    'first_name' => 'MAHAMMAD',
    'last_name' => 'ASHRAF',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  166 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/973',
    'student_name' => 'ASHRAF',
    'first_name' => 'ASHRAF',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  167 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/974',
    'student_name' => 'HASKARALI V',
    'first_name' => 'HASKARALI',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  168 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/975',
    'student_name' => 'NOUSHAD',
    'first_name' => 'NOUSHAD',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  169 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/977',
    'student_name' => 'SHAIJA NAVAZ',
    'first_name' => 'SHAIJA',
    'last_name' => 'NAVAZ',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  170 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/978',
    'student_name' => 'BUSHRA MUSALYARAKAM',
    'first_name' => 'BUSHRA',
    'last_name' => 'MUSALYARAKAM',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  171 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/979',
    'student_name' => 'MANEESHA M',
    'first_name' => 'MANEESHA',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  172 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/980',
    'student_name' => 'AFEEFA UMMER K P',
    'first_name' => 'AFEEFA UMMER K',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  173 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/981',
    'student_name' => 'LEYA V N',
    'first_name' => 'LEYA V',
    'last_name' => 'N',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  174 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/982',
    'student_name' => 'FATHIMATH RASHIDA K P',
    'first_name' => 'FATHIMATH RASHIDA K',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  175 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/984',
    'student_name' => 'AFRINA BABU KHAN',
    'first_name' => 'AFRINA BABU',
    'last_name' => 'KHAN',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  176 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/985',
    'student_name' => 'LUBNA HASSAN',
    'first_name' => 'LUBNA',
    'last_name' => 'HASSAN',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  177 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/986',
    'student_name' => 'HASNA P',
    'first_name' => 'HASNA',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  178 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/987',
    'student_name' => 'SAHEERA NAUSHAD',
    'first_name' => 'SAHEERA',
    'last_name' => 'NAUSHAD',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  179 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/988',
    'student_name' => 'JAMSHEENA',
    'first_name' => 'JAMSHEENA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  180 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/989',
    'student_name' => 'SHAJILA V A',
    'first_name' => 'SHAJILA V',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  181 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/990',
    'student_name' => 'SHAFEEKHA T P',
    'first_name' => 'SHAFEEKHA T',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  182 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/991',
    'student_name' => 'SHABIRA P A',
    'first_name' => 'SHABIRA P',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  183 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/992',
    'student_name' => 'FAZILA',
    'first_name' => 'FAZILA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  184 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/993',
    'student_name' => 'RAHEENA A V',
    'first_name' => 'RAHEENA A',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  185 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/994',
    'student_name' => 'PREMA',
    'first_name' => 'PREMA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  186 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/995',
    'student_name' => 'JUBAIRIYA P',
    'first_name' => 'JUBAIRIYA',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  187 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/996',
    'student_name' => 'HABEEBA NASREEN',
    'first_name' => 'HABEEBA',
    'last_name' => 'NASREEN',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  188 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/997',
    'student_name' => 'SAHIRA C',
    'first_name' => 'SAHIRA',
    'last_name' => 'C',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  189 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/998',
    'student_name' => 'JAMNISHA T K',
    'first_name' => 'JAMNISHA T',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  190 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/999',
    'student_name' => 'HASNA MOL',
    'first_name' => 'HASNA',
    'last_name' => 'MOL',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  191 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1000',
    'student_name' => 'NASHEEDA V',
    'first_name' => 'NASHEEDA',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  192 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1001',
    'student_name' => 'MUSAMMIL A',
    'first_name' => 'MUSAMMIL',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  193 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1002',
    'student_name' => 'RAFEEQUE',
    'first_name' => 'RAFEEQUE',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  194 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1003',
    'student_name' => 'SALMAN N ANAS',
    'first_name' => 'SALMAN N',
    'last_name' => 'ANAS',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  195 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1004',
    'student_name' => 'SHANAVAS S',
    'first_name' => 'SHANAVAS',
    'last_name' => 'S',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  196 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1005',
    'student_name' => 'ASHIK T',
    'first_name' => 'ASHIK',
    'last_name' => 'T',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  197 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1006',
    'student_name' => 'ILLYAS M M',
    'first_name' => 'ILLYAS M',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  198 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1007',
    'student_name' => 'SUFAIL I',
    'first_name' => 'SUFAIL',
    'last_name' => 'I',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  199 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1008',
    'student_name' => 'ZAKARIYA C A',
    'first_name' => 'ZAKARIYA C',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  200 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1009',
    'student_name' => 'MIDLAJ K',
    'first_name' => 'MIDLAJ',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  201 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1010',
    'student_name' => 'ABDULKADER',
    'first_name' => 'ABDULKADER',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  202 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1011',
    'student_name' => 'ISHAQ MANGALATH',
    'first_name' => 'ISHAQ',
    'last_name' => 'MANGALATH',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  203 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1012',
    'student_name' => 'ANZAL S',
    'first_name' => 'ANZAL',
    'last_name' => 'S',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  204 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1013',
    'student_name' => 'MUHAMMAD SHIBILY',
    'first_name' => 'MUHAMMAD',
    'last_name' => 'SHIBILY',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  205 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1014',
    'student_name' => 'SIDHIQUE M',
    'first_name' => 'SIDHIQUE',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  206 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1015',
    'student_name' => 'AFSAL K A',
    'first_name' => 'AFSAL K',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  207 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1016',
    'student_name' => 'MUHAMMED SHIBILI',
    'first_name' => 'MUHAMMED',
    'last_name' => 'SHIBILI',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  208 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1017',
    'student_name' => 'NASAR MUBARACK',
    'first_name' => 'NASAR',
    'last_name' => 'MUBARACK',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  209 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1018',
    'student_name' => 'MUHAMMAD MUSTHAFA T',
    'first_name' => 'MUHAMMAD MUSTHAFA',
    'last_name' => 'T',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  210 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1019',
    'student_name' => 'SUHANA S K',
    'first_name' => 'SUHANA S',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  211 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1020',
    'student_name' => 'HASEEBA P P',
    'first_name' => 'HASEEBA P',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  212 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1021',
    'student_name' => 'SINI VARGHESE',
    'first_name' => 'SINI',
    'last_name' => 'VARGHESE',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  213 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1022',
    'student_name' => 'REMYA K V',
    'first_name' => 'REMYA K',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  214 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1023',
    'student_name' => 'DR. RISVANA R',
    'first_name' => 'DR. RISVANA',
    'last_name' => 'R',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  215 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1024',
    'student_name' => 'SELJA SIRAJ AMAN',
    'first_name' => 'SELJA SIRAJ',
    'last_name' => 'AMAN',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  216 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1025',
    'student_name' => 'FASEELA P P',
    'first_name' => 'FASEELA P',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  217 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1026',
    'student_name' => 'SHERMIN A',
    'first_name' => 'SHERMIN',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  218 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1027',
    'student_name' => 'YUSRIYYA K RAFEEK',
    'first_name' => 'YUSRIYYA K',
    'last_name' => 'RAFEEK',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  219 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1028',
    'student_name' => 'SAJARUNISA K S',
    'first_name' => 'SAJARUNISA K',
    'last_name' => 'S',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  220 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1029',
    'student_name' => 'FATHIMA RIYAS',
    'first_name' => 'FATHIMA',
    'last_name' => 'RIYAS',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  221 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1030',
    'student_name' => 'IRFANA N',
    'first_name' => 'IRFANA',
    'last_name' => 'N',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  222 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1031',
    'student_name' => 'KAMARUNNEESA C',
    'first_name' => 'KAMARUNNEESA',
    'last_name' => 'C',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  223 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1032',
    'student_name' => 'BUSHRA SAMSUDDIN',
    'first_name' => 'BUSHRA',
    'last_name' => 'SAMSUDDIN',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  224 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1033',
    'student_name' => 'BEEVI ZAKKIYA A',
    'first_name' => 'BEEVI ZAKKIYA',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  225 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1034',
    'student_name' => 'JASIHA FATHIMA J S',
    'first_name' => 'JASIHA FATHIMA J',
    'last_name' => 'S',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  226 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1035',
    'student_name' => 'MUFEEDHA MARYAM C M',
    'first_name' => 'MUFEEDHA MARYAM C',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  227 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1036',
    'student_name' => 'RAJINA A',
    'first_name' => 'RAJINA',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  228 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1037',
    'student_name' => 'HAFSA V PAREETH',
    'first_name' => 'HAFSA V',
    'last_name' => 'PAREETH',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  229 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1038',
    'student_name' => 'RASIYA KOLADIKAL',
    'first_name' => 'RASIYA',
    'last_name' => 'KOLADIKAL',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  230 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1039',
    'student_name' => 'MINI P V',
    'first_name' => 'MINI P',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  231 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1040',
    'student_name' => 'FABNA O K',
    'first_name' => 'FABNA O',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  232 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1041',
    'student_name' => 'LIYANA P V',
    'first_name' => 'LIYANA P',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  233 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1042',
    'student_name' => 'ABDUL HALEEM P H',
    'first_name' => 'ABDUL HALEEM P',
    'last_name' => 'H',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  234 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1043',
    'student_name' => 'ABDUL LATHEEF A',
    'first_name' => 'ABDUL LATHEEF',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  235 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1044',
    'student_name' => 'ALIAS K P',
    'first_name' => 'ALIAS K',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  236 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1045',
    'student_name' => 'MUHAMMED AFSAL A',
    'first_name' => 'MUHAMMED AFSAL',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  237 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1046',
    'student_name' => 'ANAS N V',
    'first_name' => 'ANAS N',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  238 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1047',
    'student_name' => 'MUHAMMED ANAS M P',
    'first_name' => 'MUHAMMED ANAS M',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  239 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1048',
    'student_name' => 'MUHAMMED FAZIL M',
    'first_name' => 'MUHAMMED FAZIL',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  240 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1049',
    'student_name' => 'MUHAMMED HARIS',
    'first_name' => 'MUHAMMED',
    'last_name' => 'HARIS',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  241 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1050',
    'student_name' => 'MUHAMMED JANSIF K C',
    'first_name' => 'MUHAMMED JANSIF K',
    'last_name' => 'C',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  242 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1051',
    'student_name' => 'MOHAMMED NIZAMUDDIN',
    'first_name' => 'MOHAMMED',
    'last_name' => 'NIZAMUDDIN',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  243 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1052',
    'student_name' => 'MUHAMMAD MUSTHAFA',
    'first_name' => 'MUHAMMAD',
    'last_name' => 'MUSTHAFA',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  244 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1053',
    'student_name' => 'NOUSHAD P',
    'first_name' => 'NOUSHAD',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  245 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1054',
    'student_name' => 'RAKHEEB R',
    'first_name' => 'RAKHEEB',
    'last_name' => 'R',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  246 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1055',
    'student_name' => 'ROSHID SUBRAMANIAN',
    'first_name' => 'ROSHID',
    'last_name' => 'SUBRAMANIAN',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  247 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1056',
    'student_name' => 'SAITHALAVI MULLAPPALLI',
    'first_name' => 'SAITHALAVI',
    'last_name' => 'MULLAPPALLI',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  248 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1057',
    'student_name' => 'SANTHOSH K',
    'first_name' => 'SANTHOSH',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  249 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1058',
    'student_name' => 'UMMAR FAROOQ C H',
    'first_name' => 'UMMAR FAROOQ C',
    'last_name' => 'H',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  250 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1059',
    'student_name' => 'MUHAMAD MUNAWAR',
    'first_name' => 'MUHAMAD',
    'last_name' => 'MUNAWAR',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  251 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1060',
    'student_name' => 'AMINA HABEEB',
    'first_name' => 'AMINA',
    'last_name' => 'HABEEB',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  252 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1061',
    'student_name' => 'ANNATH P P',
    'first_name' => 'ANNATH P',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  253 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1062',
    'student_name' => 'ANSHIDA THASNEEM',
    'first_name' => 'ANSHIDA',
    'last_name' => 'THASNEEM',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  254 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1063',
    'student_name' => 'AYISHA SHIBINA',
    'first_name' => 'AYISHA',
    'last_name' => 'SHIBINA',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  255 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1064',
    'student_name' => 'DHANYA UNNIKRISHNAN',
    'first_name' => 'DHANYA',
    'last_name' => 'UNNIKRISHNAN',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  256 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1065',
    'student_name' => 'DIVYA S',
    'first_name' => 'DIVYA',
    'last_name' => 'S',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  257 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1066',
    'student_name' => 'FATHIMATHUL AFRA P H',
    'first_name' => 'FATHIMATHUL AFRA P',
    'last_name' => 'H',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  258 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1067',
    'student_name' => 'FIDHA K',
    'first_name' => 'FIDHA',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  259 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1068',
    'student_name' => 'HAJARA',
    'first_name' => 'HAJARA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  260 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1069',
    'student_name' => 'HASEENA P T PALLITHAZHATH',
    'first_name' => 'HASEENA P T',
    'last_name' => 'PALLITHAZHATH',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  261 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1070',
    'student_name' => 'JIJIMOL VARGHESE',
    'first_name' => 'JIJIMOL',
    'last_name' => 'VARGHESE',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  262 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1071',
    'student_name' => 'JILSHA P K',
    'first_name' => 'JILSHA P',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  263 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1072',
    'student_name' => 'JUSAILA E',
    'first_name' => 'JUSAILA',
    'last_name' => 'E',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  264 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1073',
    'student_name' => 'VELLUVA VEETTIL LEKHA',
    'first_name' => 'VELLUVA VEETTIL',
    'last_name' => 'LEKHA',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  265 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1074',
    'student_name' => 'MUHSINA MOHAMED SAREEF',
    'first_name' => 'MUHSINA MOHAMED',
    'last_name' => 'SAREEF',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  266 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1075',
    'student_name' => 'NAEEMA K',
    'first_name' => 'NAEEMA',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  267 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1076',
    'student_name' => 'NAJMA SHERIN C H',
    'first_name' => 'NAJMA SHERIN C',
    'last_name' => 'H',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  268 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1077',
    'student_name' => 'NASEEHA P N',
    'first_name' => 'NASEEHA P',
    'last_name' => 'N',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  269 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1078',
    'student_name' => 'NIRMALA V V',
    'first_name' => 'NIRMALA V',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  270 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1079',
    'student_name' => 'NISHIDHA S',
    'first_name' => 'NISHIDHA',
    'last_name' => 'S',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  271 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1080',
    'student_name' => 'RAHANA V A',
    'first_name' => 'RAHANA V',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  272 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1081',
    'student_name' => 'RIZWANA K',
    'first_name' => 'RIZWANA',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  273 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1082',
    'student_name' => 'RINSY SALEEM K E',
    'first_name' => 'RINSY SALEEM K',
    'last_name' => 'E',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  274 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1083',
    'student_name' => 'RUBEENA RAHMAN',
    'first_name' => 'RUBEENA',
    'last_name' => 'RAHMAN',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  275 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1084',
    'student_name' => 'SAFA M S',
    'first_name' => 'SAFA M',
    'last_name' => 'S',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  276 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1085',
    'student_name' => 'SAFANA P V',
    'first_name' => 'SAFANA P',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  277 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1086',
    'student_name' => 'SAMEENA N H',
    'first_name' => 'SAMEENA N',
    'last_name' => 'H',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  278 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1087',
    'student_name' => 'BASEERA S S',
    'first_name' => 'BASEERA S',
    'last_name' => 'S',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  279 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1088',
    'student_name' => 'NASEEHA S S',
    'first_name' => 'NASEEHA S',
    'last_name' => 'S',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  280 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1089',
    'student_name' => 'SHAHALA FARSANA',
    'first_name' => 'SHAHALA',
    'last_name' => 'FARSANA',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  281 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1090',
    'student_name' => 'SHABEENA BANU Y K',
    'first_name' => 'SHABEENA BANU Y',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  282 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1091',
    'student_name' => 'SHAMSEERA A V',
    'first_name' => 'SHAMSEERA A',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  283 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1092',
    'student_name' => 'SHIFA FATHIMA SHAJI',
    'first_name' => 'SHIFA FATHIMA',
    'last_name' => 'SHAJI',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  284 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1093',
    'student_name' => 'SOUDHA V',
    'first_name' => 'SOUDHA',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  285 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1094',
    'student_name' => 'SUHARA BATHOOL V P',
    'first_name' => 'SUHARA BATHOOL V',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  286 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1095',
    'student_name' => 'ASNA P A',
    'first_name' => 'ASNA P',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  287 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1096',
    'student_name' => 'FATHIMA BASHEER',
    'first_name' => 'FATHIMA',
    'last_name' => 'BASHEER',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-08-27',
  ),
  288 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1097',
    'student_name' => 'ASHARAF K P',
    'first_name' => 'ASHARAF K',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  289 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1098',
    'student_name' => 'JAYAN A',
    'first_name' => 'JAYAN',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  290 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1099',
    'student_name' => 'MOHMAD IRFAN',
    'first_name' => 'MOHMAD',
    'last_name' => 'IRFAN',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  291 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1100',
    'student_name' => 'MUHAMMED DILBAR',
    'first_name' => 'MUHAMMED',
    'last_name' => 'DILBAR',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  292 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1101',
    'student_name' => 'MUHAMMED FARHAN A K',
    'first_name' => 'MUHAMMED FARHAN A',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  293 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1102',
    'student_name' => 'MUHAMMED SHAFEEQ',
    'first_name' => 'MUHAMMED',
    'last_name' => 'SHAFEEQ',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  294 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1103',
    'student_name' => 'MUHAMMED',
    'first_name' => 'MUHAMMED',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  295 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1104',
    'student_name' => 'SHALIM S',
    'first_name' => 'SHALIM',
    'last_name' => 'S',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  296 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1105',
    'student_name' => 'SUNEESH P G',
    'first_name' => 'SUNEESH P',
    'last_name' => 'G',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  297 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1106',
    'student_name' => 'JAYAN R',
    'first_name' => 'JAYAN',
    'last_name' => 'R',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  298 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1107',
    'student_name' => 'AESHA HUSNA',
    'first_name' => 'AESHA',
    'last_name' => 'HUSNA',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  299 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1108',
    'student_name' => 'ARIFA ALI',
    'first_name' => 'ARIFA',
    'last_name' => 'ALI',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  300 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1109',
    'student_name' => 'FARSANA FAISAL',
    'first_name' => 'FARSANA',
    'last_name' => 'FAISAL',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  301 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1110',
    'student_name' => 'FATHIMA P M',
    'first_name' => 'FATHIMA P',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  302 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1111',
    'student_name' => 'FATHIMATHUL SUHARA',
    'first_name' => 'FATHIMATHUL',
    'last_name' => 'SUHARA',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  303 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1112',
    'student_name' => 'FIDHA',
    'first_name' => 'FIDHA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  304 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1113',
    'student_name' => 'HANCY HANEES',
    'first_name' => 'HANCY',
    'last_name' => 'HANEES',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  305 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1114',
    'student_name' => 'HAYA FATHIMA A K',
    'first_name' => 'HAYA FATHIMA A',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  306 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1115',
    'student_name' => 'HUSNA FATHIMA P',
    'first_name' => 'HUSNA FATHIMA',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  307 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1116',
    'student_name' => 'MARJANA PARVEEN',
    'first_name' => 'MARJANA',
    'last_name' => 'PARVEEN',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  308 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1117',
    'student_name' => 'FATHIMATHU NAFIA',
    'first_name' => 'FATHIMATHU',
    'last_name' => 'NAFIA',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  309 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1118',
    'student_name' => 'NASWIHA BEEVI K K',
    'first_name' => 'NASWIHA BEEVI K',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  310 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1119',
    'student_name' => 'RADHIKA M M',
    'first_name' => 'RADHIKA M',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  311 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1120',
    'student_name' => 'RAHMATH K',
    'first_name' => 'RAHMATH',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  312 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1121',
    'student_name' => 'RAJI P VARGHESE',
    'first_name' => 'RAJI P',
    'last_name' => 'VARGHESE',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  313 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1122',
    'student_name' => 'RAMSHA',
    'first_name' => 'RAMSHA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  314 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1123',
    'student_name' => 'RUSHDI MOL',
    'first_name' => 'RUSHDI',
    'last_name' => 'MOL',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  315 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1124',
    'student_name' => 'SABNA M A',
    'first_name' => 'SABNA M',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  316 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1125',
    'student_name' => 'SAMINA MOHAMMED SALI',
    'first_name' => 'SAMINA MOHAMMED',
    'last_name' => 'SALI',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  317 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1126',
    'student_name' => 'SAMURA V P',
    'first_name' => 'SAMURA V',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  318 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1127',
    'student_name' => 'SHAHADIYA',
    'first_name' => 'SHAHADIYA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  319 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1128',
    'student_name' => 'SHERIN FATHIMA',
    'first_name' => 'SHERIN',
    'last_name' => 'FATHIMA',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  320 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1129',
    'student_name' => 'SHIMIDHA',
    'first_name' => 'SHIMIDHA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  321 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1130',
    'student_name' => 'SULEKHA SALIM',
    'first_name' => 'SULEKHA',
    'last_name' => 'SALIM',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  322 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1131',
    'student_name' => 'SUNEERA P V',
    'first_name' => 'SUNEERA P',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  323 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1132',
    'student_name' => 'UZMA',
    'first_name' => 'UZMA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  324 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1133',
    'student_name' => 'ZAKIYA VAJEEHA',
    'first_name' => 'ZAKIYA',
    'last_name' => 'VAJEEHA',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  325 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1134',
    'student_name' => 'SHIBILU RAHMAN N',
    'first_name' => 'SHIBILU RAHMAN',
    'last_name' => 'N',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  326 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1135',
    'student_name' => 'MOHAMMED SAWADH N A',
    'first_name' => 'MOHAMMED SAWADH N',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  327 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1136',
    'student_name' => 'MOHAMMED ANSAR K V',
    'first_name' => 'MOHAMMED ANSAR K',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  328 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1137',
    'student_name' => 'UVAISUL QARNI',
    'first_name' => 'UVAISUL',
    'last_name' => 'QARNI',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  329 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1138',
    'student_name' => 'AHAMMAD SINAN',
    'first_name' => 'AHAMMAD',
    'last_name' => 'SINAN',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  330 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1139',
    'student_name' => 'SIHABUDEEN',
    'first_name' => 'SIHABUDEEN',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  331 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1140',
    'student_name' => 'MUHAMMAD SHIHABUDEEN',
    'first_name' => 'MUHAMMAD',
    'last_name' => 'SHIHABUDEEN',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  332 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1141',
    'student_name' => 'ISSUDHEEN',
    'first_name' => 'ISSUDHEEN',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  333 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1142',
    'student_name' => 'LUQMAN M',
    'first_name' => 'LUQMAN',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  334 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1143',
    'student_name' => 'MUHAMMED SATHAR A K',
    'first_name' => 'MUHAMMED SATHAR A',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  335 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1144',
    'student_name' => 'RENJITHA V',
    'first_name' => 'RENJITHA',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  336 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1145',
    'student_name' => 'ABITHA E V',
    'first_name' => 'ABITHA E',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  337 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1146',
    'student_name' => 'BHAVANA K',
    'first_name' => 'BHAVANA',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  338 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1147',
    'student_name' => 'SUMITHA K V',
    'first_name' => 'SUMITHA K',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  339 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1148',
    'student_name' => 'ABITHA A P',
    'first_name' => 'ABITHA A',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  340 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1149',
    'student_name' => 'MYFUSA K M',
    'first_name' => 'MYFUSA K',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  341 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1150',
    'student_name' => 'FATHIMATH SUHARA C M',
    'first_name' => 'FATHIMATH SUHARA C',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  342 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1151',
    'student_name' => 'NAFEESTHUL MISRIYA K',
    'first_name' => 'NAFEESTHUL MISRIYA',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  343 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1152',
    'student_name' => 'LATHISHA A',
    'first_name' => 'LATHISHA',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  344 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1153',
    'student_name' => 'RAMLATH',
    'first_name' => 'RAMLATH',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  345 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1154',
    'student_name' => 'SHABA SHIREEN',
    'first_name' => 'SHABA',
    'last_name' => 'SHIREEN',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  346 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1155',
    'student_name' => 'MUHASINA T',
    'first_name' => 'MUHASINA',
    'last_name' => 'T',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  347 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1156',
    'student_name' => 'NASLU SADAKATH P',
    'first_name' => 'NASLU SADAKATH',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  348 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1157',
    'student_name' => 'RUJA JACOB',
    'first_name' => 'RUJA',
    'last_name' => 'JACOB',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  349 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1158',
    'student_name' => 'HESNA NAZRIN K P',
    'first_name' => 'HESNA NAZRIN K',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  350 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1159',
    'student_name' => 'ABDULLA K M',
    'first_name' => 'ABDULLA K',
    'last_name' => 'M',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  351 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1160',
    'student_name' => 'ABDURAHMAN P',
    'first_name' => 'ABDURAHMAN',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  352 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1161',
    'student_name' => 'AHAMMED HAMIM SHAMEEL T',
    'first_name' => 'AHAMMED HAMIM SHAMEEL',
    'last_name' => 'T',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  353 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1162',
    'student_name' => 'FAHIS FARHAN P K',
    'first_name' => 'FAHIS FARHAN P',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  354 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1163',
    'student_name' => 'MUHAMMED SINAN PM',
    'first_name' => 'MUHAMMED SINAN',
    'last_name' => 'PM',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  355 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1164',
    'student_name' => 'FAZLU RAHMAN K',
    'first_name' => 'FAZLU RAHMAN',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  356 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1165',
    'student_name' => 'JAYARAJ C',
    'first_name' => 'JAYARAJ',
    'last_name' => 'C',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  357 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1166',
    'student_name' => 'MUHAMMED ABOOBACKER SAEED K K',
    'first_name' => 'MUHAMMED ABOOBACKER SAEED K',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  358 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1167',
    'student_name' => 'MUHAMMAD ANAS C A',
    'first_name' => 'MUHAMMAD ANAS C',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  359 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1168',
    'student_name' => 'MUHAMMED FAROOKH P V',
    'first_name' => 'MUHAMMED FAROOKH P',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  360 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1169',
    'student_name' => 'SHAJAN MATHEW',
    'first_name' => 'SHAJAN',
    'last_name' => 'MATHEW',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  361 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1170',
    'student_name' => 'THAHA N A',
    'first_name' => 'THAHA N',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  362 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1171',
    'student_name' => 'HARIPRASAD P K',
    'first_name' => 'HARIPRASAD P',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  363 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1172',
    'student_name' => 'ANESA YASMIN C K',
    'first_name' => 'ANESA YASMIN C',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  364 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1173',
    'student_name' => 'FASEELA KP',
    'first_name' => 'FASEELA',
    'last_name' => 'KP',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  365 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1174',
    'student_name' => 'FATHIMA HUDA KT',
    'first_name' => 'FATHIMA HUDA',
    'last_name' => 'KT',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  366 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1175',
    'student_name' => 'FATHIMATH SHAFNA P V',
    'first_name' => 'FATHIMATH SHAFNA P',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  367 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1176',
    'student_name' => 'FEMZYMOL',
    'first_name' => 'FEMZYMOL',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  368 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1177',
    'student_name' => 'HAZEENA O A',
    'first_name' => 'HAZEENA O',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  369 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1178',
    'student_name' => 'JESLIYA SHABANA P',
    'first_name' => 'JESLIYA SHABANA',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  370 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1179',
    'student_name' => 'JOLLY ABRAHAM',
    'first_name' => 'JOLLY',
    'last_name' => 'ABRAHAM',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  371 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1180',
    'student_name' => 'NAILOFER T A',
    'first_name' => 'NAILOFER T',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  372 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1181',
    'student_name' => 'PRIYAMMA T',
    'first_name' => 'PRIYAMMA',
    'last_name' => 'T',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  373 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1182',
    'student_name' => 'RAISHIMI RAFEEK',
    'first_name' => 'RAISHIMI',
    'last_name' => 'RAFEEK',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  374 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1183',
    'student_name' => 'REMYA KRISHNA',
    'first_name' => 'REMYA',
    'last_name' => 'KRISHNA',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  375 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1184',
    'student_name' => 'SAFNA',
    'first_name' => 'SAFNA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  376 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1185',
    'student_name' => 'SAFNA R I',
    'first_name' => 'SAFNA R',
    'last_name' => 'I',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  377 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1186',
    'student_name' => 'SHABINA V S',
    'first_name' => 'SHABINA V',
    'last_name' => 'S',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  378 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1187',
    'student_name' => 'SHABNA P',
    'first_name' => 'SHABNA',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  379 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1188',
    'student_name' => 'SHAFNA HILAR',
    'first_name' => 'SHAFNA',
    'last_name' => 'HILAR',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  380 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1189',
    'student_name' => 'SHAHNA A V',
    'first_name' => 'SHAHNA A',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  381 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1190',
    'student_name' => 'SHANTI MATHAI',
    'first_name' => 'SHANTI',
    'last_name' => 'MATHAI',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  382 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1191',
    'student_name' => 'SHYNI ALIAS',
    'first_name' => 'SHYNI',
    'last_name' => 'ALIAS',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  383 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1192',
    'student_name' => 'SHAMNA K',
    'first_name' => 'SHAMNA',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  384 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1193',
    'student_name' => 'SRUTHY RAJAN',
    'first_name' => 'SRUTHY',
    'last_name' => 'RAJAN',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  385 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1194',
    'student_name' => 'ABIDA',
    'first_name' => 'ABIDA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  386 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1195',
    'student_name' => 'RUKSANA A P',
    'first_name' => 'RUKSANA A',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  387 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1196',
    'student_name' => 'JOUHARA',
    'first_name' => 'JOUHARA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  388 => 
  array (
    'certificate_code' => 'IZZA/MLP24/DCP/1197',
    'student_name' => 'NINSHIDA V',
    'first_name' => 'NINSHIDA',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2026-01-27',
  ),
  389 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/582',
    'student_name' => 'MOHAMMED IRSHAD C P',
    'first_name' => 'MOHAMMED IRSHAD C',
    'last_name' => 'P',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  390 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/583',
    'student_name' => 'ELHAR M',
    'first_name' => 'ELHAR',
    'last_name' => 'M',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  391 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/584',
    'student_name' => 'ABDUL RAHOOF',
    'first_name' => 'ABDUL',
    'last_name' => 'RAHOOF',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  392 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/585',
    'student_name' => 'SAMEERA K',
    'first_name' => 'SAMEERA',
    'last_name' => 'K',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  393 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/586',
    'student_name' => 'FATHIMATH RASHIFA',
    'first_name' => 'FATHIMATH',
    'last_name' => 'RASHIFA',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  394 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/587',
    'student_name' => 'NASEEBA SULFATH N C',
    'first_name' => 'NASEEBA SULFATH N',
    'last_name' => 'C',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  395 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/588',
    'student_name' => 'RAMEENA P M',
    'first_name' => 'RAMEENA P',
    'last_name' => 'M',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  396 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/589',
    'student_name' => 'DEEPTI M',
    'first_name' => 'DEEPTI',
    'last_name' => 'M',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  397 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/590',
    'student_name' => 'RAMSY A',
    'first_name' => 'RAMSY',
    'last_name' => 'A',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  398 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/591',
    'student_name' => 'REMYA A S',
    'first_name' => 'REMYA A',
    'last_name' => 'S',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  399 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/592',
    'student_name' => 'BINDU V P',
    'first_name' => 'BINDU V',
    'last_name' => 'P',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  400 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/593',
    'student_name' => 'USMAN FAIZY',
    'first_name' => 'USMAN',
    'last_name' => 'FAIZY',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  401 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/594',
    'student_name' => 'MUHAMED SUHAIL M P',
    'first_name' => 'MUHAMED SUHAIL M',
    'last_name' => 'P',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  402 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/595',
    'student_name' => 'MUHAMMED SAJID',
    'first_name' => 'MUHAMMED',
    'last_name' => 'SAJID',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  403 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/596',
    'student_name' => 'MOHAMMAD ALI K',
    'first_name' => 'MOHAMMAD ALI',
    'last_name' => 'K',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  404 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/597',
    'student_name' => 'ANVAR JAVAD K',
    'first_name' => 'ANVAR JAVAD',
    'last_name' => 'K',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  405 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/598',
    'student_name' => 'AL AMEEN',
    'first_name' => 'AL',
    'last_name' => 'AMEEN',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  406 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/599',
    'student_name' => 'SIDHEEQUE A',
    'first_name' => 'SIDHEEQUE',
    'last_name' => 'A',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  407 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/600',
    'student_name' => 'ISAHAC K',
    'first_name' => 'ISAHAC',
    'last_name' => 'K',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  408 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/601',
    'student_name' => 'RIYAS BABU P',
    'first_name' => 'RIYAS BABU',
    'last_name' => 'P',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  409 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/602',
    'student_name' => 'JASHIR C N',
    'first_name' => 'JASHIR C',
    'last_name' => 'N',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  410 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/603',
    'student_name' => 'MUHAMMED SIYAD M M',
    'first_name' => 'MUHAMMED SIYAD M',
    'last_name' => 'M',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  411 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/604',
    'student_name' => 'SIRAJ M',
    'first_name' => 'SIRAJ',
    'last_name' => 'M',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  412 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/605',
    'student_name' => 'DR. AHAMED RABEEH T K',
    'first_name' => 'DR. AHAMED RABEEH T',
    'last_name' => 'K',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  413 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/606',
    'student_name' => 'RASHID C A',
    'first_name' => 'RASHID C',
    'last_name' => 'A',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  414 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/607',
    'student_name' => 'SHAHID A K',
    'first_name' => 'SHAHID A',
    'last_name' => 'K',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  415 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/608',
    'student_name' => 'MUHAMMED NISAMUDHEEN M',
    'first_name' => 'MUHAMMED NISAMUDHEEN',
    'last_name' => 'M',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  416 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/609',
    'student_name' => 'RIYAS FAIZY U P',
    'first_name' => 'RIYAS FAIZY U',
    'last_name' => 'P',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  417 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/610',
    'student_name' => 'ABDUL RAVOOF BAQAVI',
    'first_name' => 'ABDUL RAVOOF',
    'last_name' => 'BAQAVI',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  418 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/611',
    'student_name' => 'NAFSAL P C',
    'first_name' => 'NAFSAL P',
    'last_name' => 'C',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  419 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/612',
    'student_name' => 'MUHAMMED MUSTHAFA',
    'first_name' => 'MUHAMMED',
    'last_name' => 'MUSTHAFA',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  420 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/613',
    'student_name' => 'SIDHEEQUE THOLAN',
    'first_name' => 'SIDHEEQUE',
    'last_name' => 'THOLAN',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  421 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/614',
    'student_name' => 'MOHAMMED FAWAZ C',
    'first_name' => 'MOHAMMED FAWAZ',
    'last_name' => 'C',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  422 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/615',
    'student_name' => 'UMMER FAROOQUE P',
    'first_name' => 'UMMER FAROOQUE',
    'last_name' => 'P',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  423 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/616',
    'student_name' => 'SAMEERALI SAQUAFI',
    'first_name' => 'SAMEERALI',
    'last_name' => 'SAQUAFI',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  424 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/617',
    'student_name' => 'MOHAMED IDREES N',
    'first_name' => 'MOHAMED IDREES',
    'last_name' => 'N',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  425 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/618',
    'student_name' => 'ABDULLA M',
    'first_name' => 'ABDULLA',
    'last_name' => 'M',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  426 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/619',
    'student_name' => 'SAFEEDA A V',
    'first_name' => 'SAFEEDA A',
    'last_name' => 'V',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  427 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/620',
    'student_name' => 'SIVAPRIYA S S',
    'first_name' => 'SIVAPRIYA S',
    'last_name' => 'S',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  428 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/621',
    'student_name' => 'ANSILA',
    'first_name' => 'ANSILA',
    'last_name' => '',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  429 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/622',
    'student_name' => 'HUSNA P T',
    'first_name' => 'HUSNA P',
    'last_name' => 'T',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  430 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/623',
    'student_name' => 'NAVYA M',
    'first_name' => 'NAVYA',
    'last_name' => 'M',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  431 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/624',
    'student_name' => 'AYISHA NARMIN',
    'first_name' => 'AYISHA',
    'last_name' => 'NARMIN',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  432 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/625',
    'student_name' => 'HARSHITHA M V MUKKILE VALAPPIL',
    'first_name' => 'HARSHITHA M V MUKKILE',
    'last_name' => 'VALAPPIL',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  433 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/626',
    'student_name' => 'SHAJITHA RAJAN',
    'first_name' => 'SHAJITHA',
    'last_name' => 'RAJAN',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  434 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/627',
    'student_name' => 'SAJIDA NAZEER',
    'first_name' => 'SAJIDA',
    'last_name' => 'NAZEER',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  435 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/628',
    'student_name' => 'RASNA U',
    'first_name' => 'RASNA',
    'last_name' => 'U',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  436 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/629',
    'student_name' => 'SHEHARA P T',
    'first_name' => 'SHEHARA P',
    'last_name' => 'T',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  437 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/630',
    'student_name' => 'BINSIYA V K',
    'first_name' => 'BINSIYA V',
    'last_name' => 'K',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  438 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/631',
    'student_name' => 'SHAKIRA T P',
    'first_name' => 'SHAKIRA T',
    'last_name' => 'P',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  439 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/632',
    'student_name' => 'NASEERA MOL K M',
    'first_name' => 'NASEERA MOL K',
    'last_name' => 'M',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  440 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/633',
    'student_name' => 'KADEEJABANU O P',
    'first_name' => 'KADEEJABANU O',
    'last_name' => 'P',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  441 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/634',
    'student_name' => 'RAMLA K',
    'first_name' => 'RAMLA',
    'last_name' => 'K',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  442 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/635',
    'student_name' => 'RAFEEDA MOIDEEN O',
    'first_name' => 'RAFEEDA MOIDEEN',
    'last_name' => 'O',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  443 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/636',
    'student_name' => 'HAMNATH T',
    'first_name' => 'HAMNATH',
    'last_name' => 'T',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  444 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/637',
    'student_name' => 'HASEENA FAISAL',
    'first_name' => 'HASEENA',
    'last_name' => 'FAISAL',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  445 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/638',
    'student_name' => 'SUMAYYA K',
    'first_name' => 'SUMAYYA',
    'last_name' => 'K',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  446 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/639',
    'student_name' => 'FARISA ALMAS',
    'first_name' => 'FARISA',
    'last_name' => 'ALMAS',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  447 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/640',
    'student_name' => 'FATHIMATH NAEEMA',
    'first_name' => 'FATHIMATH',
    'last_name' => 'NAEEMA',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-04-21',
  ),
  448 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/641',
    'student_name' => 'MUHAMMED RASHID K E',
    'first_name' => 'MUHAMMED RASHID K',
    'last_name' => 'E',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  449 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/642',
    'student_name' => 'ABDUL RASHID P',
    'first_name' => 'ABDUL RASHID',
    'last_name' => 'P',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  450 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/643',
    'student_name' => 'ANVARUDHEEN K K',
    'first_name' => 'ANVARUDHEEN K',
    'last_name' => 'K',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  451 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/644',
    'student_name' => 'ASIF ALI C P',
    'first_name' => 'ASIF ALI C',
    'last_name' => 'P',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  452 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/645',
    'student_name' => 'JAYANANDAN R',
    'first_name' => 'JAYANANDAN',
    'last_name' => 'R',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  453 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/646',
    'student_name' => 'KABEER A',
    'first_name' => 'KABEER',
    'last_name' => 'A',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  454 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/647',
    'student_name' => 'MUHAMMED FAROOK C M',
    'first_name' => 'MUHAMMED FAROOK C',
    'last_name' => 'M',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  455 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/648',
    'student_name' => 'MUHAMMED MIDLAJ T',
    'first_name' => 'MUHAMMED MIDLAJ',
    'last_name' => 'T',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  456 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/649',
    'student_name' => 'MOHAMMED SAVAD T C',
    'first_name' => 'MOHAMMED SAVAD T',
    'last_name' => 'C',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  457 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/650',
    'student_name' => 'MOHAMMAD SHAFI M H',
    'first_name' => 'MOHAMMAD SHAFI M',
    'last_name' => 'H',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  458 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/651',
    'student_name' => 'AFRA KADEEJA',
    'first_name' => 'AFRA',
    'last_name' => 'KADEEJA',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  459 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/652',
    'student_name' => 'CHINCHU S R',
    'first_name' => 'CHINCHU S',
    'last_name' => 'R',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  460 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/653',
    'student_name' => 'FOUSIYA T I',
    'first_name' => 'FOUSIYA T',
    'last_name' => 'I',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  461 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/654',
    'student_name' => 'HUSNA SHARIN K',
    'first_name' => 'HUSNA SHARIN',
    'last_name' => 'K',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  462 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/655',
    'student_name' => 'JASEENA A',
    'first_name' => 'JASEENA',
    'last_name' => 'A',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  463 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/656',
    'student_name' => 'JASMINE K A',
    'first_name' => 'JASMINE K',
    'last_name' => 'A',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  464 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/657',
    'student_name' => 'MUHSINATH P K',
    'first_name' => 'MUHSINATH P',
    'last_name' => 'K',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  465 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/658',
    'student_name' => 'MUHZINA A',
    'first_name' => 'MUHZINA',
    'last_name' => 'A',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  466 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/659',
    'student_name' => 'NAYANA RAJ',
    'first_name' => 'NAYANA',
    'last_name' => 'RAJ',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  467 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/660',
    'student_name' => 'PRINCY K S',
    'first_name' => 'PRINCY K',
    'last_name' => 'S',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  468 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/661',
    'student_name' => 'RAMYA M R',
    'first_name' => 'RAMYA M',
    'last_name' => 'R',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  469 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/662',
    'student_name' => 'REEMAMOLE A U',
    'first_name' => 'REEMAMOLE A',
    'last_name' => 'U',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  470 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/663',
    'student_name' => 'SAJMI O S',
    'first_name' => 'SAJMI O',
    'last_name' => 'S',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  471 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/664',
    'student_name' => 'SANEENA YASMIN K P',
    'first_name' => 'SANEENA YASMIN K',
    'last_name' => 'P',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  472 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/665',
    'student_name' => 'SHAHANA K S',
    'first_name' => 'SHAHANA K',
    'last_name' => 'S',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  473 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/666',
    'student_name' => 'SEMEEMA MARJANA K',
    'first_name' => 'SEMEEMA MARJANA',
    'last_name' => 'K',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  474 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/667',
    'student_name' => 'TINTU MANAKKALADAN',
    'first_name' => 'TINTU',
    'last_name' => 'MANAKKALADAN',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2025-08-27',
  ),
  475 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/668',
    'student_name' => 'ABDUL RASHEED K P',
    'first_name' => 'ABDUL RASHEED K',
    'last_name' => 'P',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2026-01-27',
  ),
  476 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/669',
    'student_name' => 'MUHAMMED C M',
    'first_name' => 'MUHAMMED C',
    'last_name' => 'M',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2026-01-27',
  ),
  477 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/670',
    'student_name' => 'MUHAMMED HUSSAIN',
    'first_name' => 'MUHAMMED',
    'last_name' => 'HUSSAIN',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2026-01-27',
  ),
  478 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/671',
    'student_name' => 'MUHAMMED IRSHAD K',
    'first_name' => 'MUHAMMED IRSHAD',
    'last_name' => 'K',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2026-01-27',
  ),
  479 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/672',
    'student_name' => 'NAVAZ ABDUL KHADIR',
    'first_name' => 'NAVAZ ABDUL',
    'last_name' => 'KHADIR',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2026-01-27',
  ),
  480 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/673',
    'student_name' => 'AYISA SABNA K T',
    'first_name' => 'AYISA SABNA K',
    'last_name' => 'T',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2026-01-27',
  ),
  481 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/674',
    'student_name' => 'BUSHRA E',
    'first_name' => 'BUSHRA',
    'last_name' => 'E',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2026-01-27',
  ),
  482 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/675',
    'student_name' => 'FATHIMA SANA C P',
    'first_name' => 'FATHIMA SANA C',
    'last_name' => 'P',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2026-01-27',
  ),
  483 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/676',
    'student_name' => 'GEETHA P',
    'first_name' => 'GEETHA',
    'last_name' => 'P',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2026-01-27',
  ),
  484 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/677',
    'student_name' => 'HASNA EM',
    'first_name' => 'HASNA',
    'last_name' => 'EM',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2026-01-27',
  ),
  485 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/678',
    'student_name' => 'KADEEJA P V',
    'first_name' => 'KADEEJA P',
    'last_name' => 'V',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2026-01-27',
  ),
  486 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/679',
    'student_name' => 'NASEERA C M',
    'first_name' => 'NASEERA C',
    'last_name' => 'M',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2026-01-27',
  ),
  487 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/680',
    'student_name' => 'SAHLA FARSANA',
    'first_name' => 'SAHLA',
    'last_name' => 'FARSANA',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2026-01-27',
  ),
  488 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/681',
    'student_name' => 'SAMHA T A',
    'first_name' => 'SAMHA T',
    'last_name' => 'A',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2026-01-27',
  ),
  489 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/682',
    'student_name' => 'SHEBITHA P U',
    'first_name' => 'SHEBITHA P',
    'last_name' => 'U',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2026-01-27',
  ),
  490 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/683',
    'student_name' => 'SHAFEEKHA T P',
    'first_name' => 'SHAFEEKHA T',
    'last_name' => 'P',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2026-01-27',
  ),
  491 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/684',
    'student_name' => 'SUHARA P',
    'first_name' => 'SUHARA',
    'last_name' => 'P',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2026-01-27',
  ),
  492 => 
  array (
    'certificate_code' => 'IZZA/MLP24/PDLDM/685',
    'student_name' => 'MUHSINA K P',
    'first_name' => 'MUHSINA K',
    'last_name' => 'P',
    'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
    'issue_date' => '2026-01-27',
  ),
  493 => 
  array (
    'certificate_code' => 'IZZA/MLP24/SK-PSY/515',
    'student_name' => 'SHIHAB T E',
    'first_name' => 'SHIHAB T',
    'last_name' => 'E',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  494 => 
  array (
    'certificate_code' => 'IZZA/MLP24/SK-PSY/516',
    'student_name' => 'SHEMEERA',
    'first_name' => 'SHEMEERA',
    'last_name' => '',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  495 => 
  array (
    'certificate_code' => 'IZZA/MLP24/SK-PSY/517',
    'student_name' => 'DULFUCKER ALI',
    'first_name' => 'DULFUCKER',
    'last_name' => 'ALI',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  496 => 
  array (
    'certificate_code' => 'IZZA/MLP24/SK-PSY/518',
    'student_name' => 'MOHAMMED ASHRAF K',
    'first_name' => 'MOHAMMED ASHRAF',
    'last_name' => 'K',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  497 => 
  array (
    'certificate_code' => 'IZZA/MLP24/SK-PSY/519',
    'student_name' => 'SHARAFUDHEEN T',
    'first_name' => 'SHARAFUDHEEN',
    'last_name' => 'T',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  498 => 
  array (
    'certificate_code' => 'IZZA/MLP24/SK-PSY/520',
    'student_name' => 'MUHAMMAD NIZAR T A',
    'first_name' => 'MUHAMMAD NIZAR T',
    'last_name' => 'A',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  499 => 
  array (
    'certificate_code' => 'IZZA/MLP24/SK-PSY/521',
    'student_name' => 'MASHOOD P P',
    'first_name' => 'MASHOOD P',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  500 => 
  array (
    'certificate_code' => 'IZZA/MLP24/SK-PSY/522',
    'student_name' => 'IBRAHIM KUTTY',
    'first_name' => 'IBRAHIM',
    'last_name' => 'KUTTY',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  501 => 
  array (
    'certificate_code' => 'IZZA/MLP24/SK-PSY/523',
    'student_name' => 'IBRAHIM P',
    'first_name' => 'IBRAHIM',
    'last_name' => 'P',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  502 => 
  array (
    'certificate_code' => 'IZZA/MLP24/SK-PSY/524',
    'student_name' => 'HASEENA P V',
    'first_name' => 'HASEENA P',
    'last_name' => 'V',
    'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
    'issue_date' => '2025-04-21',
  ),
  503 => 
  array (
    'certificate_code' => 'IZZA/MLP24/SK-PSY/525',
    'student_name' => 'SIDHIK P',
    'first_name' => 'SIDHIK',
    'last_name' => 'P',
    'course' => 'iCEEDS SKILL GUIDANCE AND COUNSELLING',
    'issue_date' => '2025-08-27',
  ),
);

        DB::transaction(function () use ($updates) {
            foreach ($updates as $item) {
                Certificate::updateOrCreate(
                    ['certificate_code' => $item['certificate_code']],
                    [
                        'student_name' => $item['student_name'],
                        'first_name' => $item['first_name'],
                        'last_name' => $item['last_name'],
                        'course' => $item['course'],
                        'issue_date' => $item['issue_date'],
                    ]
                );
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Data updates are non-destructive and generally irreversible without original snapshot
    }
};
