<?php 
/*
Apa itu Object?
Object adalah data yang berisi field / properties / attributes dan method / function / behavior

Apa itu Class?
Class adalah blueprint, prototype atau cetakan untuk membuat Object
Class berisikan deklarasi semua properties dan functions yang dimiliki oleh Object
Setiap Object selalu dibuat dari Class
Dan sebuah Class bisa membuat Object tanpa batas

Class dan Object : Person
http://www.plantuml.com/plantuml/uml/TP7DQeGm4CVlynI3f_RW2nHQn59QUf12ds3KgH_632Jn86NVVMVPoBgH5Hp8x_-Ha1G-a0lBR00QGzxZ3pil5ly1zViDRh0T_WtEXufctaD3H-Pf_M9Zv2ckhUhFYU5Jf2rNlhUS0AGUkGd8au3--7BR5Lyn-vWaYznGWhVeA9hLSGX_YzfKESIhfNFIxohgfHtWCjAAKbcsAMa5zQGLyURo_0sl1trtJ87tV9G7GYoE0XHiMtsJCm00

Class dan Object : Car
http://www.plantuml.com/plantuml/uml/NP312i8m44Jl-Oeb9ptq1mIbKWGldXGyRzjG8ib6qbImuh_RR4jIp27BliaCGye-e0-3DQ8nsFTGeOUFWEbSWzVK0Q5LwxtsI2q3TfweqwGssuMuPm9V8LpzK4q0V26DAEO1Euw4FSWZ0va5pexApRrTG9aJZCLHyBtsnrqcdDptmKnDizkwMXljn39N2PUPo2pbbBEZDbQ8Fr8K1yXFAgymg2Ia-l-SUoLSAce7Qtu0

Membuat Class
Untuk membuat class, kita bisa menggunakan kata kunci class
Penamaan class biasa menggunakan format CamelCase

Kode : Class
class Person
{
}

Membuat Object
Object adalah hasil instansiasi dari sebuah class
Untuk membuat object kita bisa menggunakan kata kunci new, dan diikuti dengan nama Class dan kurung ()

Kode : Object
require_once "data/Person.php";

$person = new Person();

var_dump($person);

Properties
Fields / Properties / Attributes adalah data yang bisa kita sisipkan di dalam Object
Namun sebelum kita bisa memasukkan data di fields, kita harus mendeklarasikan data apa aja yang dimiliki object tersebut di dalam deklarasi class-nya
Membuat field sama seperti membuat variable, namun ditempatkan di block class, namun diawali dengan kata kunci var

Kode : Properties
class Person
{
    var string $name;
    var ?string $address = null;
    var string $country = "Indonesia";
}

Manipulasi Properties
Fields yang ada di object, bisa kita manipulasi. 
Untuk memanipulasi data field, sama seperti cara pada variable
Untuk mengakses field, kita butuh kata kunci -> setelah nama object dan diikuti nama fields nya

Kode : Manipulasi Properties
require_once "data/Person.php";

$person = new Person("Eko", "Subang");
$person->name = "Eko";
$person->address = "Subang";

var_dump($person);

echo "Name : $person->name" . PHP_EOL;
echo "Address : $person->address" . PHP_EOL;
echo "Country : $person->country" . PHP_EOL;

Properties Type Declaration
Sama seperti di function, di properties pun, kita bisa membuat type declaration
Ini membuat PHP otomatis mengecek tipe data yang sesuai dengan type declaration yang telah ditentukan
Jika kita mencoba mengubah properties dengan type yang berbeda, maka otomatis akan error
Ingat, bahwa PHP memiliki fitur type juggling, yang secara otomatis bisa mengkonversi ke tipe data lain
Untuk menambahkan type declaration, kita bisa tambahkan setelah kata kunci var di properties

Kode : Properties dengan Type
    var string $name;
    var ?string $address = null;
    var string $country = "Indonesia";

Default Properties Value
Sama seperti variable, di properties juga kita bisa langsung mengisi value nya
Ini mirip seperti default value, jadi jika tidak diubah di object, maka properties akan memiliki value tersebut

Kode : Properties Default Value
    var string $country = "Indonesia";

Nullable Properties
Saat kita menambah type declaration di properties atau di function argument, maka secara otomatis kita tidak bisa mengirim data null ke dalam properties atau function argument tersebut
Di PHP 7.4 dikenalkan nullable type, jadi kita bisa mengirim data null ke properties atau function arguments
Caranya sebelum type declaration nya, kita bisa tambahkan tanda ?

Kode : Nullable Properties
    var ?string $address = null;

Function
Selain menambahkan properties, kita juga bisa menambahkan function ke object
Cara dengan mendeklarasikan function tersebut di dalam block class
Sama seperti function biasanya, kita juga bisa menambahkan return value dan parameter
Untuk mengakses function tersebut, kita bisa menggunakan tanda -> dan diikuti dengan nama method nya. Sama seperti mengakses properties

Kode : Function
function sayHello(?string $name)
    {
        if (is_null($name)) {
            echo "Hi, my name is $this->name" . PHP_EOL;
        } else {
            echo "Hi $name, my name is $this->name" . PHP_EOL;
        }
    }

Kode : Memanggil Function
require_once "data/Person.php";

$eko = new Person("Eko", "Subang");
$eko->name = "Eko";
$eko->sayHello("Budi");

$joko = new Person("Joko", "Cirebon");
$joko->name = "Joko";
$joko->sayHello(null);

$eko->info();
$joko->info();

This Keyword
Saat kita membuat kode di dalam function di dalam class, kita bisa menggunakan kata kunci this untuk mengakses object saat ini
Misal kadang kita butuh mengakses properties atau function lain di class yang sama

Kode : This Keyword
 function sayHello(?string $name)
    {
        if (is_null($name)) {
            echo "Hi, my name is $this->name" . PHP_EOL;
        } else {
            echo "Hi $name, my name is $this->name" . PHP_EOL;
        }
    }

Constant
Properties di class bisa diubah, mirip seperti variable
Di class juga kita membuat constant, data yang tidak bisa diubah
Di materi PHP Dasar, kita belajar untuk membuat constant itu perlu menggunakan function define()
Namun sejak PHP 7.4, kita bisa menggunakan kata kunci const untuk membuat constant, mirip seperti variable, namun tidak menggunakan karakter $

Kode : Constant
require_once "data/Person.php";

define("APPLICATION", "Belajar PHP OOP");
const APP_VERSION = "1.0.0";

echo APPLICATION . PHP_EOL;
echo APP_VERSION . PHP_EOL;
echo Person::AUTHOR . PHP_EOL;

Kode : Constant di Class
const AUTHOR = "Programmer Zaman Now";

Kode : Mengakses Constant di Class
echo Person::AUTHOR . PHP_EOL;

self Keyword
Properties vs Constant
Saat kita membuat object, properties yang terdapat di class akan secara otomatis dibuat per object, oleh karena itu untuk mengakses properties, kita perlu menggunakan object, atau jika dari dalam object tersebut sendiri, kita perlu menggunakan kata kunci this
Sedangkan berbeda dengan constant, constant di class tidak akan dibuat per object. Constant itu hidupnya di class, bukan di object, oleh karena itu untuk mengaksesnya kita perlu menggunakan NamaClass::NAMA_CONSTANT
Secara sederhana, properties akan dibuat satu per instance class (object), sedangkan constant dibuat satu per class

self Keyword
Jika di dalam class (misal di function) kita ingin mengakses constant, kita perlu mengakses menggunakan NamaClass::NAMA_CONSTANT
Namun jika di dalam class yang sama, kita bisa menggunakan kata kunci self untuk mempermudah

Kode : self Keyword

class Person {
    function info()
    {
        echo "Author : " . self::AUTHOR . PHP_EOL;
    }
}

$eko->info();
$joko->info();

Constructor
Saat kita membuat Object, maka kita seperti memanggil sebuah function, karena kita menggunakan kurung ()
Di dalam class PHP, kita bisa membuat constructor, constructor adalah function  yang akan dipanggil saat pertama kali Object dibuat.
Mirip seperti di function, kita bisa memberi parameter pada constructor
Nama constructor di PHP haruslah __construct()

Kode : Membuat Constructor
class Person
{
    const AUTHOR = "Programmer Zaman Now";

    var string $name;
    var ?string $address = null;
    var string $country = "Indonesia";

    function __construct(string $name, ?string $address)
    {
        $this->name = $name;
        $this->address = $address;
    }

Kode : Menggunakan Constructor

<?php

require_once "data/Person.php";

$eko = new Person("Eko", "Subang");

var_dump($eko);

Destructor
Jika constructor adalah function yang akan dipanggil ketika object dibuat
Destructor adalah function yang akan dipanggil ketika object dihapus dari memory
Biasanya ketika object tersebut sudah tidak lagi digunakan, atau ketika aplikasi akan mati
Untuk membuat function destructor, kita bisa menggunakan nama function __destruct()
Khusus untuk destructor, kita tidak boleh menambahkan function argument
Dalam penggunaan sehari-hari, ini misal cocok untuk menutup koneksi ke database atau menutup proses menulis ke file, sehingga tidak terjadi memory leak

Kode : Destructor
function __destruct()
    {
        echo "Object person $this->name is destroyed" . PHP_EOL;
    }

require_once "data/Person.php";

$eko = new Person("Eko", "Subang");
$joko = new Person("Joko", "Subang");

echo "Program Selesai" . PHP_EOL;

Inheritance
Inheritance atau pewarisan adalah kemampuan untuk menurunkan sebuah class ke class lain
Dalam artian, kita bisa membuat class Parent dan class Child
Class Child, hanya bisa punya satu class Parent, namun satu class Parent bisa punya banyak class Child
Saat sebuah class diturunkan, maka semua properties dan function yang ada di class Parent, secara otomatis akan dimiliki oleh class Child
Untuk melakukan pewarisan, di class Child, kita harus menggunakan kata kunci extends lalu diikuti dengan nama class parent nya.

Kode : Inheritance
class Manager
{
    var string $name;

    var string $title;

    public function __construct(string $name = "", string $title = "Manager")
    {
        $this->name = $name;
        $this->title = $title;
    }

    function sayHello(string $name): void
    {
        echo "Hi $name, my name is Manager $this->name" . PHP_EOL;
    }
}

class VicePresident extends Manager
{

    public function __construct(string $name = "")
    {
        // tidak wajib, tapi direkomendasikan
        parent::__construct($name, "VP");
    }

    function sayHello(string $name): void
    {
        echo "Hi $name, my name is VP $this->name" . PHP_EOL;
    }
}

Kode : Mengakses Method Parent
require_once "data/Manager.php";

$manager = new Manager();
$manager->name = "Budi";
$manager->sayHello("Joko");

$vp = new VicePresident();
$vp->name = "Eko";
$vp->sayHello("Joko");

Namespace
Saat kita membuat aplikasi, bisa dipastikan kita akan banyak sekali membuat class
Jika class terlalu banyak, kadang akan menyulitkan kita untuk mencari atau mengklasifikasikan jenis-jenis class
PHP memiliki fitur namespace, dimana kita bisa menyimpan class-class kita di dalam namespace
Namespace bisa nested, dan jika kita ingin mengakses class yang terdapat di namespace, kita perlu menyebutkan nama namespace nya
Namespace bagus ketika kita punya beberapa class yang sama, dengan menggunakan namespace nama class sama tidak akan menjadikan error di PHP

Membuat Namespace
Untuk membuat namespace, kita bisa menggunakan kata kunci namespace
Jika kita ingin membuat sub namespace, kita cukup gunakan karakter \ setelah namespace sebelumnya

Kode : Membuat Namespace
namespace Data\One {
    class Conflict
    {
    }

    class Sample
    {
    }

    class Dummy
    {
    }
}

namespace Data\Two {
    class Conflict
    {
    }
}

Kode : Membuat Object dari Namespace
require_once "data/Conflict.php";
    require_once "data/Helper.php";

    $conflict1 = new Data\One\Conflict();
    $conflict2 = new Data\Two\Conflict();

Function dan Constant di Namespace
Selain class, kita juga menggunakan function dan constant di namespace
Dan jika kita ingin menggunakan function atau constant tersebut, kita bisa menggunakannya dengan diawali dengan nama namespace nya

Kode : Function dan Constant di Namespace
namespace Helper;

function helpMe()
{
    echo "HELP ME" . PHP_EOL;
}

const APPLICATION = "Belajar PHP OOP";

Global Namespace
Secara default saat kita membuat kode di PHP sebenarnya itu disimpan di global namespace
Global namespace adalah namespace yang tidak memiliki nama namespace

Kode : Global Namespace
namespace {

    require_once "data/Conflict.php";
    require_once "data/Helper.php";

    $conflict1 = new Data\One\Conflict();
    $conflict2 = new Data\Two\Conflict();

    echo Helper\APPLICATION . PHP_EOL;

    Helper\helpMe();
}

Import

use Keyword
Sebelumnya kita sudah tahu bahwa untuk menggunakan class, function atau constant di namespace kita perlu menyebutkan nama namespace nya di awal
Jika terlalu sering menggunakan class, function atau constant yang sama, maka terlalu banyak duplikasi dengan menyebut namespace yang sama berkali-kali
Hal ini bisa kita hindari dengan cara mengimport class, function atau constant tersebut dengan menggunakan kata kunci use

Kode : use Keyword
require_once "data/Conflict.php";
require_once "data/Helper.php";

use Data\One\Conflict;
use function Helper\helpMe;
use const Helper\APPLICATION;

$conflict1 = new Conflict();
$conflict2 = new Data\Two\Conflict();

helpMe();

echo APPLICATION . PHP_EOL;

Alias
Saat kita menggunakan use, artinya kita tidak perlu lagi menggunakan nama namespace diawal class ketika kita ingin membuat class tersebut
Namun bagaimana jika kita ternyata nama class nya sama?
Untungnya PHP memiliki fitur yang namanya alias
Alias adalah kemampuan membuat nama lain dari class, function atau constant yang ada
Kita bisa menggunakan kata kunci as setelah melakukan use

Kode : Alias
require_once "data/Conflict.php";
require_once "data/Helper.php";

use Data\One\Conflict as Conflict1;
use Data\Two\Conflict as Conflict2;
use function Helper\helpMe as help;
use const Helper\APPLICATION as APP;

$conflict1 = new Conflict1();
$conflict2 = new Conflict2();

help();

echo APP . PHP_EOL;

Group use Declaration
Kadang kita butuh melakukan import banyak hal di satu namespace yang sama
PHP memiliki fitur grup use, dimana kita bisa import beberapa class, function atau constant dalam satu perintah use
Untuk melakukan itu, kita bisa menggunakan kurung { } 

Kode : Group use Declaration
require_once "data/Conflict.php";
require_once "data/Helper.php";

use Data\One\{Conflict as Conflict1, Dummy, Sample};
use function Helper\{helpMe};

$conflict = new Conflict1();
$dummy = new Dummy();
$sample = new Sample();

Visibility
Visibility / Access modifier adalah kemampuan properties, function dan constant dapat diakses dari mana saja
Secara default, properties, function dan constant yang kita buat di dalam class bisa diakses dari mana saja, atau artinya dia adalah public
Selain public, masih ada beberapa visibility lainnya
Secara default kata kunci var untuk properties adalah sifatnya public

Access Level
 Modifier
Class
Subclass
World
public
Y
Y
Y
protected
Y
Y
N
private
Y
N
N

Kode : Class Product
class Product
{
    protected string $name;
    protected int $price;

    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}

class ProductDummy extends Product
{

    public function info()
    {
        echo "Name $this->name" . PHP_EOL;
        echo "Price $this->price" . PHP_EOL;
    }
}

Kode : Menggunakan Product
require_once "data/Product.php";

$product = new Product("Apple", 20000);

echo $product->getName() . PHP_EOL;
echo $product->getPrice() . PHP_EOL;

$dummy = new ProductDummy("Dummy", 1000);
$dummy->info();

Function Overriding
Function overriding adalah kemampuan mendeklarasikan ulang function di child class, yang sudah ada di parent class
Saat kita melakukan proses overriding tersebut, secara otomatis ketika kita membuat object dari class child, function yang di class parent tidak bisa diakses lagi

Kode : Method Overriding
class Manager
{
    var string $name;

    var string $title;

    public function __construct(string $name = "", string $title = "Manager")
    {
        $this->name = $name;
        $this->title = $title;
    }

    function sayHello(string $name): void
    {
        echo "Hi $name, my name is Manager $this->name" . PHP_EOL;
    }
}

class VicePresident extends Manager
{

    public function __construct(string $name = "")
    {
        // tidak wajib, tapi direkomendasikan
        parent::__construct($name, "VP");
    }

    function sayHello(string $name): void
    {
        echo "Hi $name, my name is VP $this->name" . PHP_EOL;
    }
}

Kode : Mengakses Function Overriding
require_once "data/Manager.php";

$manager = new Manager();
$manager->name = "Budi";
$manager->sayHello("Joko");

$vp = new VicePresident();
$vp->name = "Eko";
$vp->sayHello("Joko");

parent Keyword
Kadang kita ingin mengakses function yang terdapat di class parent yang sudah terlanjur kita override di class child
Untuk mengakses function milik class parent, kita bisa menggunakan kata kunci parent
Sederhananya, parent digunakan untuk mengakses class parent

Kode : Parent Keyword
namespace Data;

class Shape
{

    public function getCorner()
    {
        return -1;
    }
}

class Rectangle extends Shape
{

    public function getCorner()
    {
        return 4;
    }

    public function getParentCorner()
    {
        return parent::getCorner();
    }
}

Kode menggunakan parent keyword
require_once "data/Shape.php";

use Data\{Shape, Rectangle};

$shape = new Shape();
echo $shape->getCorner() . PHP_EOL;

$rectangle = new Rectangle();
echo $rectangle->getCorner() . PHP_EOL;
echo $rectangle->getParentCorner() . PHP_EOL;

Constructor Overriding
Karena constructor sama seperti function, maka constructor-pun bisa kita deklarasikan ulang di class Child nya
Sebenarnya di PHP, kita bisa meng-override function dengan arguments yang berbeda, namun sangat tidak disarankan
Jika kita melakukan override function dengan arguments berbeda, maka PHP akan menampilkan WARNING
Namun berbeda dengan constructor overriding, kita boleh meng-override dengan mengubah arguments nya, namun direkomendasikan untuk memanggil parent constructor

Kode : Merubah Arguments Overriding
class Manager
{
    var string $name;

    var string $title;

    public function __construct(string $name = "", string $title = "Manager")
    {
        $this->name = $name;
        $this->title = $title;
    }

Kode : Constructor Overriding (2)
class VicePresident extends Manager
{

    public function __construct(string $name = "")
    {
        // tidak wajib, tapi direkomendasikan
        parent::__construct($name, "VP");
    }

Polymorphism
Polymorphism berasal dari bahasa Yunani yang berarti banyak bentuk.
Dalam OOP, Polymorphism adalah kemampuan sebuah object berubah bentuk menjadi bentuk lain
Polymorphism erat hubungannya dengan Inheritance

Kode : Inheritance
class Programmer
{

    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

class BackendProgrammer extends Programmer
{
}

class FrontendProgrammer extends Programmer
{
}

class Company
{
    public Programmer $programmer;
}


function sayHelloProgrammer(Programmer $programmer)
{
    if ($programmer instanceof BackendProgrammer) {
        echo "Hello Backend Programmer $programmer->name" . PHP_EOL;
    } else if ($programmer instanceof FrontendProgrammer) {
        echo "Hello Frontend Programmer $programmer->name" . PHP_EOL;
    } else if ($programmer instanceof Programmer) {
        echo "Hello Programmer $programmer->name" . PHP_EOL;
    }
}


Kode : Polymorphism
require_once "data/Programmer.php";

$company = new Company();
$company->programmer = new Programmer("Eko");
var_dump($company);

$company->programmer = new BackendProgrammer("Eko");
var_dump($company);

$company->programmer = new FrontendProgrammer("Eko");
var_dump($company);

Kode : Function Argument Polymorphism
function sayHelloProgrammer(Programmer $programmer)
{
    if ($programmer instanceof BackendProgrammer) {
        echo "Hello Backend Programmer $programmer->name" . PHP_EOL;
    } else if ($programmer instanceof FrontendProgrammer) {
        echo "Hello Frontend Programmer $programmer->name" . PHP_EOL;
    } else if ($programmer instanceof Programmer) {
        echo "Hello Programmer $programmer->name" . PHP_EOL;
    }
}

sayHelloProgrammer(new Programmer("Eko"));
sayHelloProgrammer(new BackendProgrammer("Eko"));
sayHelloProgrammer(new FrontendProgrammer("Eko"));

Type Check & Casts
Sebelumnya kita sudah tau cara melakukan konversi tipe data bukan class
Khusus untuk tipe data object, kita tidak perlu melakukan konversi secara eksplisit
Namun agar aman, sebelum melakukan casts, pastikan kita melakukan type check (pengecekan tipe data), dengan menggunakan kata kunci instanceof
Hasil operator instanceof adalah boolean, true jika tipe data sesuai, false jika tidak sesuai

Kode : Type Check & Casts
function sayHelloProgrammer(Programmer $programmer)
{
    if ($programmer instanceof BackendProgrammer) {
        echo "Hello Backend Programmer $programmer->name" . PHP_EOL;
    } else if ($programmer instanceof FrontendProgrammer) {
        echo "Hello Frontend Programmer $programmer->name" . PHP_EOL;
    } else if ($programmer instanceof Programmer) {
        echo "Hello Programmer $programmer->name" . PHP_EOL;
    }
}

Abstract Class
Saat kita membuat class, kita bisa menjadikan sebuah class sebagai abstract class.
Abstract class artinya, class tersebut tidak bisa dibuat sebagai object secara langsung, hanya bisa diturunkan
Untuk membuat sebuah class menjadi abstract, kita bisa menggunakan kata kunci abstract sebelum kata kunci class
Sehingga Abstract Class bisa kita gunakan sebagai kontrak child class

Kode : Abstract Class
namespace Data;

abstract class Location
{

    public string $name;
}

class City extends Location
{
}

class Province extends Location
{
}

class Country extends Location
{
}

Kode : Membuat Abstract Class
require_once "data/Location.php";

use Data\{Location, City, Province, Country};

// $location = new Location(); ERROR

$city = new City();
$province = new Province();
$country = new Country();

Abstract Function
Saat kita membuat class yang abstract, kita bisa membuat abstract function juga di dalam class abstract tersebut
Saat kita membuat sebuah abstract function, kita tidak boleh membuat block function untuk function tersebut
Artinya, abstract function wajib di override di class child
Abstract function tidak boleh memiliki access modifier private

Kode : Abstract Function
namespace Data;

require_once "Food.php";

abstract class Animal
{
    public string $name;

    abstract public function run(): void;

    abstract public function eat(AnimalFood $animalFood): void;
}

class Cat extends Animal
{
    public function run(): void
    {
        echo "Cat $this->name is running" . PHP_EOL;
    }

    public function eat(AnimalFood $animalFood): void
    {
        echo "Cat is eating" . PHP_EOL;
    }
}

Kode : Menggunakan Abstract Function
require_once "data/Animal.php";

use Data\{Animal, Cat, Dog};

$cat = new Cat();
$cat->name = "Luna";
$cat->run();

Getter dan Setter

Encapsulation
Encapsulation artinya memastikan data sensitif sebuah object tersembunyi dari akses luar
Hal ini bertujuan agar kita bisa menjaga agar data sebuah object tetap baik dan valid
Untuk mencapai ini, biasanya kita akan membuat semua properties menggunakan access modifier private, sehingga tidak bisa diakses atau diubah dari luar
Agar bisa diubah, kita akan menyediakan function untuk mengubah dan mendapatkan properties tersebut

Getter dan Setter
Di PHP, proses encapsulation sudah dibuat standarisasinya, dimana kita bisa menggunakan Getter dan Setter method.
Getter adalah function yang dibuat untuk mengambil data field
Setter ada function untuk mengubah data field

Getter dan Setter Method
 Tipe Data
Getter Method
Setter Method
boolean
isXxx(): bool
setXxx(bool value)
lainnya
getXxx(): tipeData
setXxx(tipeData value)

Kode : Getter dan Setter
class Category
{
    private string $name;
    private bool $expensive;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        if (trim($name) != "") {
            $this->name = $name;
        }
    }

    public function isExpensive(): bool
    {
        return $this->expensive;
    }

    public function setExpensive(bool $expensive): void
    {
        $this->expensive = $expensive;
    }
}

Kode : Menggunakan Getter dan Setter
require_once "data/Category.php";

$category = new Category();
$category->setName("Handphone");
$category->setExpensive(true);

$category->setName("              ");
echo "Name : {$category->getName()}" . PHP_EOL;
echo "Expensive : {$category->isExpensive()}" . PHP_EOL;

Kode : Validation di Setter
public function setName(string $name): void
    {
        if (trim($name) != "") {
            $this->name = $name;
        }
    }

Interface
Sebelumnya kita sudah tahu bahwa abstract class bisa kita gunakan sebagai kontrak untuk class child nya.
Namun sebenarnya yang lebih tepat untuk kontrak adalah Interface
Jangan salah sangka bahwa Interface disini bukanlah User Interface
Interface mirip seperti abstract class, yang membedakan adalah di Interface, semua method otomatis abstract, tidak memiliki block
Di interface kita tidak boleh memiliki properties, kita hanya boleh memiliki constant 
Untuk mewariskan interface, kita tidak menggunakan kata kunci extends, melainkan implements
Dan berbeda dengan class, kita bisa implements lebih dari satu interface

Kode : Membuat Interface
namespace Data;

interface HasBrand
{
    function getBrand(): string;
}

interface IsMaintenance
{
    function isMaintenance(): bool;
}

interface Car extends HasBrand
{
    function drive(): void;

    function getTire(): int;
}

Kode : Implement Interface
class Avanza implements Car, IsMaintenance
{

    public function drive(): void
    {
        echo "Drive Avanza" . PHP_EOL;
    }

    public function getTire(): int
    {
        return 4;
    }

    public function getBrand(): string
    {
        return "Toyota";
    }

    public function isMaintenance(): bool
    {
        return false;
    }
}

Interface Inheritance
Sebelumnya kita sudah tahu kalo di PHP, child class hanya bisa punya 1 class parent
Namun berbeda dengan interface, sebuah child class bisa implement lebih dari 1 interface
Bahkan interface pun bisa implement interface lain, bisa lebih dari 1. Namun jika interface ingin mewarisi interface lain, kita menggunakan kata kunci extends, bukan implements

Kode : Interface Inheritance
interface HasBrand
{
    function getBrand(): string;
}

interface IsMaintenance
{
    function isMaintenance(): bool;
}

interface Car extends HasBrand
{

Kode : Multiple Interface Inheritance
class Avanza implements Car, IsMaintenance
{

    public function drive(): void
    {
        echo "Drive Avanza" . PHP_EOL;
    }

    public function getTire(): int
    {
        return 4;
    }

    public function getBrand(): string
    {
        return "Toyota";
    }

    public function isMaintenance(): bool
    {
        return false;
    }
}

Trait
Selain class dan interface, di PHP terdapat feature lain bernama trait
Trait mirip dengan abstract class, kita bisa membuat konkrit function atau abstract function
Yang membedakan adalah, di trait bisa kita tambahkan ke dalam class lebih dari satu
Trait mirip seperti ekstension, dimana kita bisa menambahkan konkrit function ke dalam class dengan trait
Secara sederhana trait adalah digunakan untuk menyimpan function-function yang bisa digunakan ulang di beberapa class
Untuk menggunakan trait di class, kita bisa menggunakan kata kunci use

Kode : Membuat Trait
namespace Data\Traits;

trait SayGoodBye
{
    public function goodBye(?string $name): void
    {
        if (is_null($name)) {
            echo "Good bye" . PHP_EOL;
        } else {
            echo "Good bye $name" . PHP_EOL;
        }
    }
}

Kode : Menggunakan Trait
trait All
{
    use SayGoodBye, SayHello, HasName, CanRun {
        // bisa di override
        // hello as private;
        // goodBye as private;
    }
}

class Person extends ParentPerson
{
    use All;

    public function run(): void
    {
        echo "Person $this->name is running" . PHP_EOL;
    }
}

Trait Properties
Berbeda dengan interface, di trait, kita bisa menambahkan properties
Dengan menambahkan properties, secara otomatis class tersebut akan memiliki properties yang ada di trait

Kode : Trait Properties
trait HasName
{
    public string $name;
}

trait All
{
    use SayGoodBye, SayHello, HasName, CanRun {
        // bisa di override
        // hello as private;
        // goodBye as private;
    }
}

class Person extends ParentPerson
{
    use All;

    public function run(): void
    {
        echo "Person $this->name is running" . PHP_EOL;
    }
}

Kode : Menggunakan Trait Properties
require_once "data/SayGoodBye.php";

use Data\Traits\{Person, SayHello, SayGoodBye};

$person = new Person();
$person->goodBye("Joko");
$person->hello("Budi");

$person->name = "Eko";
var_dump($person);

$person->run();

Trait Abstract Function
Selain konkrit function, di trait juga kita bisa menambahkan abstract function
Jika terdapat abstract function di trait, maka secara otomatis function tersebut harus di override di class yang menggunakan trait tersebut

Kode : Trait Abstract Function
trait CanRun
{
    public abstract function run(): void;
}

class Person extends ParentPerson
{
    use All;

    public function run(): void
    {
        echo "Person $this->name is running" . PHP_EOL;
    }
}

Trait Overriding
Jika sebuah class memiliki parent class yang memiliki function yang sama dengan function di trait, maka secara otomatis trait akan meng-override function tersebut
Namun jika kita membuat function yang sama di class nya, maka secara otomatis kita akan meng-override function di trait
Sehingga posisinya seperti ini ParentClass =override by=> Trait =override by=> ChildClass

Kode : Override  Trait
class Person
{

    public function goodBye(?string $name): void
    {
        echo "Good bye in Person" . PHP_EOL;
    }

    public function hello(?string $name): void
    {
        echo "Hello in Person" . PHP_EOL;
    }
}

Trait Visibility Override
Selain melakukan override function di class, kita juga bisa melakukan override visibility function yang terdapat di trait
Namun untuk melakukan ini tidak perlu membuat function baru di class, kita bisa gunakan secara sederhana ketika menggunakan trait nya

Kode : Trait Visibility Override
class Person {
    use SayGoodBye, SayHello, HasName, CanRun {
        // bisa di override
        // hello as private;
        // goodBye as private;
    }
}

Trait Conflict
Jika kita menggunakan lebih dari satu trait, lalu terdapat function yang sama di trait tersebut
Maka hal tersebut akan menyebabkan konflik
Jika terjadi konflik seperti ini, kita bisa mengatasinya dengan menggunakan kata kunci insteadof

Kode : Trait Conflict (1)
trait A
{
    function doA(): void
    {
        echo "a" . PHP_EOL;
    }

    function doB(): void
    {
        echo "b" . PHP_EOL;
    }
}

trait B
{
    function doA(): void
    {
        echo "A" . PHP_EOL;
    }

    function doB(): void
    {
        echo "B" . PHP_EOL;
    }
}

Kode : Trait Conflict (2)
class Sample
{
    use A, B {
        A::doA insteadof B;
        B::doB insteadof A;
    }
}

$sample = new Sample();
$sample->doA();
$sample->doB();

Trait Inheritance
Sebelumnya kita sudah tahu bahwa class bisa menggunakan trait lebih dari satu
Lantas bagaimana dengan trait yang menggunakan trait lain?
Trait bisa menggunakan trait lain, mirip seperti interface yang bisa implement interface lain
Untuk menggunakan trait lain dari trait, penggunaannya sama seperti dengan penggunaan trait di class

Kode : Trait Inheritance
trait All
{
    use SayGoodBye, SayHello, HasName, CanRun {
        // bisa di override
        // hello as private;
        // goodBye as private;
    }
}
class Person extends ParentPerson
{
    use All;

Final Class
Kata kunci final bisa digunakan di class, dimana jika kita menggunakan kata kunci final sebelum class, maka kita menandakan bahwa class tersebut tidak bisa diwariskan lagi
Secara otomatis semua class child nya akan error

Kode : Final Class
class SocialMedia
{
    public string $name;
}

final class Facebook extends SocialMedia
{
    final public function login(string $username, string $password): bool
    {
        return true;
    }
}

// error
class FakeFacebook extends Facebook
{

Final Function
Kata kunci final juga bisa digunakan di function
Jika sebuah function kita tambahkan kata kunci final, maka artinya function tersebut tidak bisa di override lagi di class child nya
Ini sangat cocok jika kita ingin mengunci implementasi dari sebuah method agar tidak bisa diubah lagi oleh class child nya

Kode : Final Method
class Facebook extends SocialMedia
{
    final public function login(string $username, string $password): bool
    {
        return true;
    }
}

// error
class FakeFacebook extends Facebook
{
    // error
    public function login(string $username, string $password): bool
    {
        return false;
    }
}

Anonymous Class
Anonymous class atau class tanpa nama.
Adalah kemampuan mendeklarasikan class, sekaligus meng-instansiasi object-nya secara langsung
Anonymous class sangat cocok ketika kita berhadapan dengan kasus membuat implementasi interface atau abstract class sederhana, tanpa harus membuat implementasi class nya

Kode : Anonymous Class
interface HelloWorld
{
    function sayHello(): void;
}

$helloWorld = new class("Eko") implements HelloWorld
{
    public function sayHello(): void
    {
        echo "Hello $this->name" . PHP_EOL;
    }
};
$helloWorld->sayHello();

Constructor di Anonymous Class
Anonymous class juga mendukung constructor
Jadi kita bisa menambahkan constructor jika kita mau

Kode : Constructor di Anonymous Class
$helloWorld = new class("Eko") implements HelloWorld
{

    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

static Keyword
Kata kunci static adalah keyword yang bisa kita gunakan untuk membuat properties atau function di class bisa diakses secara langsung tanpa menginstansiasi class terlebih dahulu
Namun ingat, saat kita buat static properties atau function, secara otomatis hal itu tidak akan berhubungan lagi dengan class instance yang kita buat
Untuk cara mengakses static properties dan function sama seperti mengakses constant, kita bisa menggunakan operator ::
static function tidak bisa mengakses function biasa, karena function biasa menempel pada class instance sedangkan static function tidak

Kode : Static Properties
class MathHelper
{
    static public string $name = "MathHelper";

echo MathHelper::$name . PHP_EOL;
MathHelper::$name = "Eko Kurniawan";
echo MathHelper::$name . PHP_EOL;

Kode : Static Function
static public function sum(int ...$numbers): int
    {
        $total = 0;
        foreach ($numbers as $number) {
            $total += $number;
        }
        return $total;
    }

$result = MathHelper::sum(10, 10, 10, 10, 10);
echo "Result : $result" . PHP_EOL;

stdClass
stdClass adalah class kosong bawaan dari PHP
stdClass biasanya digunakan ketika kita melakukan konversi dari tipe lain menjadi tipe object
stdClass sangat berguna ketika misal kita ingin melakukan konversi dari tipe data array ke object secara otomatis

Kode : Konversi Array ke stdClass
$array = [
    "firstName" => "Eko",
    "middleName" => "Kurniawan",
    "lastName" => "Khannedy"
];

$object = (object)$array;

var_dump($object);

echo "First Name $object->firstName" . PHP_EOL;
echo "Middle Name $object->middleName" . PHP_EOL;
echo "Last Name $object->lastName" . PHP_EOL;

$arrayLagi = (array) $object;
var_dump($arrayLagi);

require_once "data/Person.php";

$person = new Person("Eko", "Subang");
var_dump($person);

$arrayPerson = (array) $person;
var_dump($arrayPerson);

Object Iteration
Saat kita membuat object dari sebuah class, kita bisa melakukan iterasi ke semua properties yang terdapat di object tersebut menggunakan foreach
Hal ini mempermudah kita saat ingin mengakses semua properties yang ada di object
Secara default, hanya properties yang public yang bisa diakses oleh foreach

Kode : Object Iteration
class Data implements IteratorAggregate
{
    var string $first = "First";
    public string $second = "Second";
    private string $third = "Third";
    protected string $forth = "Forth";

$data = new Data();

foreach ($data as $property => $value) {
    echo "$property : $value" . PHP_EOL;
}

Iterator
Sebelumnya kita melakukan iterasi data di properties secara otomatis menggunakan foreach
Jika kita ingin menangani hal ini secara manual, kita bisa menggunakan Iterator
Iterator adalah interface yang digunakan untuk melakukan iterasi, namun membuat Iterator secara manual lumayan cukup ribet, oleh karena itu sekarang kita akan gunakan ArrayIterator, yaitu iterator yang menggunakan array sebagai data iterasi nya
Dan agar class kita bisa di iterasi secara manual, kita bisa menggunakan interface IteratorAggregate, disana kita hanya butuh meng-override function getIterator() yang mengembalikan data Iterator

Kode : Iterator
class Data implements IteratorAggregate
{
    var string $first = "First";
    public string $second = "Second";
    private string $third = "Third";
    protected string $forth = "Forth";

    public function getIterator()
    {
        $array = [
            "first" => $this->first,
            "second" => $this->second,
            "third" => $this->third,
            "forth" => $this->forth,
        ];
    //
        return new ArrayIterator($array);
    }

Generator
Sebelumnya kita tahu bahwa untuk membuat object yang bisa di iterasi, kita menggunakan Iterator
Namun pembuatan Iterator secara manual sangatlah ribet
Untungnya di PHP, terdapat fitur generator, yang bisa kita gunakan untuk membuat Iterator secara otomatis hanya dengan menggunakan kata kunci yield

Kode : Generator
function getGenap(int $max): Iterator
{
    $array = [];
    for ($i = 1; $i <= $max; $i++) {
        if ($i % 2 == 0) {
            $array[] = $i;
        }
    }
    return new ArrayIterator($array);
}

foreach (getGenap(100) as $value) {
    echo "Genap : $value" . PHP_EOL;
}

function getGanjil(int $max): Iterator
{
    for ($i = 1; $i <= $max; $i++) {
        if ($i % 2 == 1) {
            yield $i;
        }
    }
}

foreach (getGanjil(100) as $value) {
    echo "Ganjil : $value" . PHP_EOL;
}

Object Cloning
Kadang kita ada kebutuhan untuk menduplikasi sebuah object
Biasanya untuk melakukan hal ini, kita bisa membuat object baru, lalu menyalin semua properties di object awal ke object baru
Untungnya PHP mendukung object cloning
Kita bisa menggunakan perintah clone untuk membuat duplikasi object
Secara otomatis semua properties di object awal akan di duplikasi ke object baru

Kode : Object Cloning
require_once "data/Student.php";

$student1 = new Student();
$student1->id = "1";
$student1->name = "Eko";
$student1->value = 100;
$student1->setSample("XXX");

var_dump($student1);

$student2 = clone $student1;
var_dump($student2);

__clone() Function
Kadang menyalin semua properties bukanlah yang kita inginkan
Misal saja kita hanya ingin menyalin beberapa properties saja, tidak ingin semuanya
Jika kita ingin memodifikasi cara PHP melakukan clone, kita bisa membuat function di dalam class nya dengan nama function __clone()
Function __clone() akan dipanggil di object hasil duplikasi setelah proses duplikasi selesai
Jadi jika kita ingin menghapus beberapa properties, bisa kita lakukan di function __clone()

Kode : __clone() Function
class Student
{
    public string $id;
    public string $name;
    public int $value;
    private string $sample;

    public function __clone()
    {
        unset($this->sample);
    }

Comparing Object
Sama seperti tipe data yang lain, untuk membandingkan dua buah object, kita bisa menggunakan operator == (equals) dan === (identity)
Operator == (equals) membandingkan semua properties yang terdapat di object tersebut, dan tiap properties juga akan dibandingkan menggunakan operator == (equals)
Sedangkan operator === (identity), maka akan membandingkan apakah object identik, artinya mengacu ke object yang sama

Kode : Comparing Object
require_once "data/Student.php";

$student1 = new Student();
$student1->id = "1";
$student1->name = "Eko";
$student1->value = 100;

$student2 = new Student();
$student2->id = "1";
$student2->name = "Eko";
$student2->value = 100;

var_dump($student1 == $student2);
var_dump($student1 === $student2);
var_dump($student1 === $student1);

Magic Function
Magic function adalah function-function yang sudah ditentukan kegunaannya di PHP
Kita tidak bisa membuat function tersebut, kecuali memang sudah ditentukan kegunaannya
Sebelumnya kita sudah membahas beberapa magic function, seperti __construct() sebagai constructor, __destruct() sebagai destructor, dan __clone() sebagai object cloning
Masih banyak magic function lainnya, kita bisa melihatnya di link berikut : https://www.php.net/manual/en/language.oop5.magic.php 

__toString() Function
__toString() function merupakan salah satu magic function yang digunakan sebagai representasi string sebuah object
Jika misal kita ingin membuat string dari object kita, kita bisa membuat function __toString()

Kode : __toString() Function
class Student
{
    public string $id;
    public string $name;
    public int $value;
    private string $sample;
    
    public function __toString(): string
    {
        return "Student id:$this->id, name:$this->name, value:$this->value";
    }

require_once "data/Student.php";

$student1 = new Student();
$student1->id = "1";
$student1->name = "Eko";
$student1->value = 100;

$string = (string) $student1;
echo $string . PHP_EOL;

// bisa seperti ini
echo $student1 . PHP_EOL;


__invoke() Function
__invoke() merupakan function yang dieksekusi ketika object yang kita buat dianggap sebagai function
Misal ketika kita membuat object $student, lalu kita melakukan $student(), maka secara otomatis function __invoke() yang akan dieksekusi

Kode : __invoke() Function
class Student
{
    public string $id;
    public string $name;
    public int $value;
    private string $sample;
    
    public function __invoke(...$arguments): void
    {
        $join = join(",", $arguments);
        echo "Invoke student with arguments $join" . PHP_EOL;
    }

require_once "data/Student.php";

$student1 = new Student();
$student1->id = "1";
$student1->name = "Eko";
$student1->value = 100;

$student1(1, "eko", true, "kurniawan");


__debugInfo() Function
Sebelumnya kita sering melakukan debug variable menggunakan function var_dump()
Function var_dump() sebenarnya memanggil function __debugInfo() 
Jika kita ingin mengubah isi dari debug info, kita bisa membuat function __debugInfo()

Kode : __debugInfo() Function
class Student
{
    public string $id;
    public string $name;
    public int $value;
    private string $sample;
    
    public function __debugInfo()
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "value" => $this->value,
            "sample" => $this->sample,
            "author" => "Eko",
            "version" => "1.0.0"
        ];
    }

require_once "data/Student.php";

$student1 = new Student();
$student1->id = "1";
$student1->name = "Eko";
$student1->value = 100;
$student1->setSample("SAMPLE");

var_dump($student1);

Dan masih banyak lagi
https://www.php.net/manual/en/language.oop5.magic.php 

Overloading
Overloading adalah kemampuan secara dinamis membuat properties atau function
Ini mirip meta programming di bahasa pemrograman lain seperti Ruby
Namun ini berbeda dengan function overloading di bahasa pemrograman lain seperti Java
Overloading ini erat kaitannya dengan magic function yang sebelumnya sudah kita bahas

Properties Overloading
Saat kita mengakses properties, maka secara otomatis properties akan diakses
Namun jika ternyata properties tersebut tidak tersedia di objectnya, maka PHP tidak secara otomatis menjadikan itu error
PHP akan melakukan fallback ke magic function
Dengan demikian kita bisa membuat properties secara dinamis dengan memanfaatkan magic function tersebut
Ada beberapa magic function yang bisa kita gunakan untuk properties overloading

Magic Function untuk Properties Overloading
 Magic Function
Keterangan
__set($name, $value) : void
Dieksekusi ketika mengubah properties yang tidak tersedia
__get($name) : mixed
Dieksekusi ketika mengakses properties yang tidak tersedia
__isset ($name ) : bool
Dieksekusi ketika mengecek isset() atau empty() properties yang tidak tersedia
__unset($name) : void
Dieksekusi ketika menggunakan unset() properties yang tidak tersedia

Kode : Properties Overloading
class Zero
{
    private array $properties = [];

    public function __get($name)
    {
        return $this->properties[$name];
    }

    public function __set($name, $value)
    {
        $this->properties[$name] = $value;
    }

    public function __isset($name): bool
    {
        return isset($this->properties[$name]);
    }

    public function __unset($name)
    {
        unset($this->properties[$name]);
    }

$zero = new Zero();
$zero->firstName = "Eko";
$zero->middleName = "Kurniawan";
$zero->lastName = "Khannedy";

echo "First Name : $zero->firstName" . PHP_EOL;
echo "Middle Name : $zero->middleName" . PHP_EOL;
echo "Last Name : $zero->lastName" . PHP_EOL;

Function Overloading
Saat kita mengakses function, maka secara otomatis function akan diakses
Namun jika ternyata function tersebut tidak tersedia di objectnya, maka PHP tidak secara otomatis menjadikan itu error
PHP akan melakukan fallback ke magic function
Dengan demikian kita bisa membuat function secara dinamis dengan memanfaatkan magic function tersebut
Ada beberapa magic function yang bisa kita gunakan untuk function overloading

Magic Function untuk Function Overloading
 Magic Function
Keterangan
__call ( $name , $arguments ) : mixed
Dieksekusi ketika memanggil function yang tidak tersedia
static __callStatic ( $name , $arguments ) : mixed
Dieksekusi ketika memanggil static function yang tidak tersedia

Kode : Function Overloading
class Zero
{
    public function __call($name, $arguments)
    {
        $join = join(",", $arguments);
        echo "Call function $name with arguments $join" . PHP_EOL;
    }

    public static function __callStatic($name, $arguments)
    {
        $join = join(",", $arguments);
        echo "Call static function $name with arguments $join" . PHP_EOL;
    }
}

$zero->sayHello("Eko", "Khannedy");
Zero::sayHello("Eko", "Khannedy");

Covariance
Saat kita meng override function dari parent class, biasanya di child class kita akan membuat function yang sama dengan function yang di parent
Covariance memungkinkan kita meng override return function yang di parent dengan return value yang lebih spesifik

Kode : Inheritance
namespace Data;
abstract class Animal {}
class Cat extends Animal {}
class Dog extends Animal {}

Kode : Covariance
namespace Data;

require_once "Animal.php";

interface AnimalShelter
{
    function adopt(string $name): Animal;
}

class CatShelter implements AnimalShelter
{
    public function adopt(string $name): Cat
    {
        $cat = new Cat();
        $cat->name = $name;
        return $cat;
    }
}

class DogShelter implements AnimalShelter
{
    public function adopt(string $name): Dog
    {
        $dog = new Dog();
        $dog->name = $name;
        return $dog;
    }
}

Contravariance
Sedangkan contravariance adalah memperbolehkan sebuah child class untuk membuat function argument yang lebih tidak spesifik dibandingkan parent nya

Kode : Inheritance
namespace Data;

class Food
{
}

class AnimalFood extends Food
{
}


Kode : Contravariance (1)
abstract class Animal
{
    public string $name;

    abstract public function run(): void;

    abstract public function eat(AnimalFood $animalFood): void;
}

Kode : Contravariance (2)
class Cat extends Animal
{
    public function run(): void
    {
        echo "Cat $this->name is running" . PHP_EOL;
    }

    public function eat(AnimalFood $animalFood): void
    {
        echo "Cat is eating" . PHP_EOL;
    }
}

class Dog extends Animal
{
    public function run(): void
    {
        echo "Dog $this->name is running" . PHP_EOL;
    }

    public function eat(Food $animalFood): void
    {
        echo "Dog is eating" . PHP_EOL;
    }
}

DateTime
Biasanya dalam bahasa pemrograman sudah disediakan cara untuk memanipulasi data waktu, termasuk di PHP
Di PHP, kita bisa menggunakan class DateTime untuk memanipulasi data waktu
Ada banyak sekali function di class DateTime yang bisa kita gunakan untuk memanipulasi data waktu

DateTime Function
 DateTime Function
Keterangan
setTime($hour, $minute, $second)
Mengubah waktu DateTime
setDate($year, $month, $day)
Mengubah tanggal DateTime
setTimestamp($unixTimestamp)
Mengubah unix timestamp DateTime

Kode : DateTime
$dateTime = new DateTime();
$dateTime->setDate(1990, 1, 20);
$dateTime->setTime(10, 10, 10, 0);

var_dump($dateTime);

DateInterval
Kadang kita hanya ingin memanipulasi waktu dan tanggal sebagian saja, misal hanya menambah 1 tahun, atau mengurai beberapa hari
Hal ini bisa dilakukan dengan function add milik DateTime
Namun function add tersebut menerima parameter berupa DateInterval
Saat menggunakan DateInterval duration, kita perlu menentukan berapa banyak kita menambah interval 
Kita bisa lihat detailnya disini : https://www.php.net/manual/en/dateinterval.construct.php 
Untuk pembuatan duration, harus diawali dengan karakter P yang artinya period

Kode : DateInterval
$dateTime = new DateTime();
$dateTime->setDate(1990, 1, 20);
$dateTime->setTime(10, 10, 10, 0);

$dateTime->add(new DateInterval("P1Y"));

$minusOneMonth = new DateInterval("P1M");
$minusOneMonth->invert = true;
$dateTime->add($minusOneMonth);

var_dump($dateTime);

DateTimeZone
Saat kita membuat object DateTime, dia akan secara otomatis membuat waktu saat ini sesuai dengan timezone yang di setting di konfigurasi date.timezone di file php.ini
Atau kita bisa menggunakan function setTimeZone untuk mengubah timezone DateTime

Kode : DateTimeZone
$now = new DateTime();
var_dump($now);
$now->setTimezone(new DateTimeZone("America/Toronto"));
var_dump($now);

Format DateTime
Kadang kita ingin membuat representasi string dari DateTime yang sudah kita buat
Hal ini bisa kita lakukan menggunakan function format()
Function format() menerima argument berupa format string, ini bisa kita gunakan untuk memanipulasi cara kita menampilkan string format waktu
Untuk detailnya kita bisa lihat di halaman dokumentasi resminya
https://www.php.net/manual/en/datetime.format.php 

Kode : Format DateTime
$string = $now->format("Y-m-d H:i:s");
echo "Waktu Saat Ini : $string" . PHP_EOL;

Parse DateTime
Selain format DateTime menjadi string, di PHP juga kita bisa melakukan hal sebaliknya, yaitu memparsing string menjadi DateTime sesuai dengan format yang kita mau
Untuk melakukan itu, kita bisa menggunakan static function createFromFormat() dari class DateTime

Kode : Parse DateTime
$date = DateTime::createFromFormat("Y-m-d H:i:s", "2020-10-10 10:10:10", new DateTimeZone("Asia/Jakarta"));
if ($date) {
    var_dump($date);
} else {
    echo "Format Salah" . PHP_EOL;
}




*/