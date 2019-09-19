DROP DATABASE IF EXISTS teamEdb;
create database teamEdb;
grant all on teamEdb.* to teamEdbuser@localhost identified by 'teamEdbuser';
use teamEdb;

create table settings (
  langid int primary key auto_increment,
  yourlang varchar(100) not null,
  quiz varchar(100) not null,
  dict varchar(100) not null,
  changlang varchar(100) not null,
  flashcards varchar(100) not null
);
insert into settings values(null, 'english', 'Quiz', 'Dictionary', 'Change language','Flashcards');
insert into settings values(null, 'lao', 'ບົດທົດສອບ', 'ພົດຈະນານຸກົມ', 'ປ່ຽນພາສາ','ຄຳສັບ');
insert into settings values(null, 'thai', 'บดทดสอบ', 'พจนานุกรม', 'เปลี่ยนภาษา','คำศัพท์');
insert into settings values(null, 'japanese', 'クイズ', '辞書', '言語変更','フラッシュカード');
insert into settings values(null, 'spanish', 'Prueba', 'Diccionario', 'Cambiar idioma','Tarjetas de Ayuda');
insert into settings values(null, 'tajik', 'Имтиҳон', 'Луғат', 'Забони нав', 'Кортҳо');
insert into settings values(null, 'chinese', '測驗', '字典', '改变语言','烧录卡');

create table members (
  memid int primary key auto_increment,
  memname varchar(100) not null,
  mememail varchar(100) not null,
  mempass varchar(100) not null
);
insert into members values(null, 'admin', 'admin@me.com', 'admin');
insert into members values(null, 'BiLL', 'b@a.com', '111111');

create table topics (
  topicid int primary key auto_increment,
  english varchar(100) not null,
  japanese varchar(100) not null,
  spanish varchar(100) not null,
  tajik varchar(100) not null,
  lao varchar(100) not null,
  thai varchar(100) not null,
  chinese varchar(100) not null

);
insert into topics values(null, 'greeting', '挨拶', 'Saludos', 'Ҳолпурсӣ', 'ຄຳທັກທາຍ', 'คำทักทาย', '欢迎' );
insert into topics values(null, 'furniture', '家具', 'Muebles', 'Анҷоми хона', 'ເຟີນິເຈີ້', 'เฟอร์นิเจอร์', '家具' );
insert into topics values(null, 'fruit', '果物', 'Frutas', 'Меваҳо', 'ຫມາກໄມ້', 'ผลไม้', '果树' );
insert into topics values(null, 'animal', '動物', 'Animales', 'Ҳайвонҳо', 'ສັດ', 'สัตว์', '动物' );
insert into topics values(null, 'sport', 'スポーツ', 'Deportes', 'Варзиш', 'ກິລາ', 'กีฬา', '运动' );

create table words (
  wordid int,
  topicid int,
  langid int,
  word varchar(100) not null,
  foreign key (topicid) references topics(topicid),
  foreign key (langid) references settings(langid)
);
insert into words values(1, 1, 1, 'Hello' );
insert into words values(2, 1, 1, 'Goodbye' );
insert into words values(3, 1, 1, 'Good morning' );
insert into words values(4, 1, 1, 'Good afternoon' );
insert into words values(5, 1, 1, 'Good evening' );
insert into words values(6, 1, 1, 'Good night' );
insert into words values(7, 1, 1, 'How are you' );
insert into words values(8, 1, 1, 'Long time no see' );
insert into words values(9, 1, 1, 'Nice to meet you' );
insert into words values(10, 1, 1, 'See you tomorrow' );
insert into words values(11, 1, 1, 'Sorry' );
insert into words values(12, 1, 1, 'Thank you' );
insert into words values(13, 1, 1, 'Good luck' );
insert into words values(14, 1, 1, 'Congratulations' );
insert into words values(15, 1, 1, 'Take care' );

insert into words values(16, 2, 1, 'Table' );
insert into words values(17, 2, 1, 'Chair' );
insert into words values(18, 2, 1, 'Fridge' );
insert into words values(19, 2, 1, 'Sofa' );
insert into words values(20, 2, 1, 'Carpet' );
insert into words values(21, 2, 1, 'Bed' );
insert into words values(22, 2, 1, 'Clock' );
insert into words values(23, 2, 1, 'Mirror' );
insert into words values(24, 2, 1, 'Lamp' );
insert into words values(25, 2, 1, 'Closet' );
insert into words values(26, 2, 1, 'Washing machine' );
insert into words values(27, 2, 1, 'Television' );
insert into words values(28, 2, 1, 'Desk' );
insert into words values(29, 2, 1, 'Cupboard' );
insert into words values(30, 2, 1, 'Door' );

insert into words values(31, 3, 1, 'Apple' );
insert into words values(32, 3, 1, 'Orange' );
insert into words values(33, 3, 1, 'Grape' );
insert into words values(34, 3, 1, 'Strawberry' );
insert into words values(35, 3, 1, 'Peach' );
insert into words values(36, 3, 1, 'Pear' );
insert into words values(37, 3, 1, 'Mango' );
insert into words values(38, 3, 1, 'Cherry' );
insert into words values(39, 3, 1, 'Banana' );
insert into words values(40, 3, 1, 'Kiwi' );
insert into words values(41, 3, 1, 'Pineapple' );
insert into words values(42, 3, 1, 'Coconut' );
insert into words values(43, 3, 1, 'Avocado' );
insert into words values(44, 3, 1, 'Plum' );
insert into words values(45, 3, 1, 'Watermelon' );

insert into words values(46, 4, 1, 'Dog');
insert into words values(47, 4, 1, 'Cat');
insert into words values(48, 4, 1, 'Pig');
insert into words values(49, 4, 1, 'Cow');
insert into words values(50, 4, 1, 'Bird');
insert into words values(51, 4, 1, 'Fish');
insert into words values(52, 4, 1, 'Elephant');
insert into words values(53, 4, 1, 'Tiger');
insert into words values(54, 4, 1, 'Snake');
insert into words values(55, 4, 1, 'Giraffe');
insert into words values(56, 4, 1, 'Rat');
insert into words values(57, 4, 1, 'Monkey');
insert into words values(58, 4, 1, 'Bear');
insert into words values(59, 4, 1, 'Duck');
insert into words values(60, 4, 1, 'Frog');

insert into words values(61, 5, 1, 'Soccer');
insert into words values(62, 5, 1, 'Tennis');
insert into words values(63, 5, 1, 'Rugby');
insert into words values(64, 5, 1, 'Badminton');
insert into words values(65, 5, 1, 'Swimming');
insert into words values(66, 5, 1, 'Baseball');
insert into words values(67, 5, 1, 'Skating');
insert into words values(68, 5, 1, 'Running');
insert into words values(69, 5, 1, 'Basketball');
insert into words values(70, 5, 1, 'Volleyball');
insert into words values(71, 5, 1, 'Table tennis');
insert into words values(72, 5, 1, 'Golf');
insert into words values(73, 5, 1, 'Boxing');
insert into words values(74, 5, 1, 'Bowling');
insert into words values(75, 5, 1, 'Ice hockey');
-- /////////////////////////////////////////////////////////////////////////////
insert into words values(1, 1, 2, 'ສະບາຍດີ/sabaidi' );
insert into words values(2, 1, 2, 'ລາກ່ອນ/lakon' );
insert into words values(3, 1, 2, 'ສະບາຍດີຕອນເຊົ້າ/sabaidi tonsao' );
insert into words values(4, 1, 2, 'ສະ​ບາຍ​ດີ​ຕອນ​ສວາຍ/sabaidi tonsuai' );
insert into words values(5, 1, 2, 'ສະ​ບາຍ​ດີ​ຕອນ​ແລງ/sabaidi tonlaeng' );
insert into words values(6, 1, 2, 'ຝັນດີ/fandi' );
insert into words values(7, 1, 2, 'ສະ​ບາຍ​ດີ​ບໍ່​/sabaidi bo' );
insert into words values(8, 1, 2, 'ດົນແລ້ວບໍ່ໄດ້ເຈິ/donleo bo dai jer' );
insert into words values(9, 1, 2, 'ຍິນ​ດີ​ທີ່​ໄດ້​ຮູ້​ຈັກ/yindi thi dai hujak' );
insert into words values(10, 1, 2, 'ເຈິກັນມື້ອື່ນ/jerkan mue eun' );
insert into words values(11, 1, 2, 'ຂໍໂທດ/kho thod' );
insert into words values(12, 1, 2, 'ຂອບ​ໃຈ/khob jai' );
insert into words values(13, 1, 2, 'ໂຊກ​ດີ/sok di' );
insert into words values(14, 1, 2, 'ຂໍສະແດງຄວາມຍິນດີນຳ/kho sadaeng khuam yindi nam' );
insert into words values(15, 1, 2, 'ຮັກສາສຸຂະພາບ/hak sa su kha pharp' );

insert into words values(16, 2, 2, 'ໂຕະ/to' );
insert into words values(17, 2, 2, 'ຕັ່ງ/tang' );
insert into words values(18, 2, 2, 'ຕູ້ເຢັນ/tu yen' );
insert into words values(19, 2, 2, 'ໂຊຟາ/sofa' );
insert into words values(20, 2, 2, 'ພົມ/phom' );
insert into words values(21, 2, 2, 'ຕຽງ/tieng' );
insert into words values(22, 2, 2, 'ໂມງ/mong' );
insert into words values(23, 2, 2, 'ແວ່ນ/vaen' );
insert into words values(24, 2, 2, 'ຕະກຽງ/ta kieng' );
insert into words values(25, 2, 2, 'ຕູ້ເຄື່ອງ/tu keuang' );
insert into words values(26, 2, 2, 'ຈັກ​ຊັກ​ເຄື່ອງ/jak sak keuang' );
insert into words values(27, 2, 2, 'ໂທລະທັດ/tho la thad' );
insert into words values(28, 2, 2, 'ໂຕ໊ະເຮັດວຽກ/to hed viek' );
insert into words values(29, 2, 2, 'ຕູ້/tu' );
insert into words values(30, 2, 2, 'ປະຕູ/pa tu' );

insert into words values(31, 3, 2, 'ຫມາກໂປມ/mak pom' );
insert into words values(32, 3, 2, 'ໝາກກ້ຽງ/mak kiang' );
insert into words values(33, 3, 2, 'ໝາກອະງຸ່ນ/mak a ngun' );
insert into words values(34, 3, 2, 'ຫມາກສະຕໍ່ເບີ່ລີ້/mak Strawberry' );
insert into words values(35, 3, 2, 'ຫມາກຄາຍ/mak khay' );
insert into words values(36, 3, 2, 'ຫມາກສາລີ້/mak sa ly' );
insert into words values(37, 3, 2, 'ຫມາກມ່ວງ/mak muang' );
insert into words values(38, 3, 2, 'ຫມາກເຊີລີ້/mak cherry' );
insert into words values(39, 3, 2, 'ໝາກກ້ວຍ/mak kuay' );
insert into words values(40, 3, 2, 'ຫມາກກີ່ວີ້/mak kiwi' );
insert into words values(41, 3, 2, 'ຫມາກນັດ/mak nad' );
insert into words values(42, 3, 2, 'ຫມາກພ້າວ/mak phao' );
insert into words values(43, 3, 2, 'ຫມາກອາໂວກ່າໂດ້/mak avocado' );
insert into words values(44, 3, 2, 'ໝາກພລໍາ/mak plum' );
insert into words values(45, 3, 2, 'ຫມາກໂມ/mak mo' );

insert into words values(46, 4, 2, 'ຫມາ/mar');
insert into words values(47, 4, 2, 'ແມວ/meow');
insert into words values(48, 4, 2, 'ໝູ/mu');
insert into words values(49, 4, 2, 'ງົວ/ngua');
insert into words values(50, 4, 2, 'ນົກ/nok');
insert into words values(51, 4, 2, 'ປາ/pa');
insert into words values(52, 4, 2, 'ຊ້າງ/sarng');
insert into words values(53, 4, 2, 'ເສືອ/seua');
insert into words values(54, 4, 2, 'ງູ/ngu');
insert into words values(55, 4, 2, 'ຢີຣາຟ/yi raf');
insert into words values(56, 4, 2, 'ໜູ/nu');
insert into words values(57, 4, 2, 'ລີງ/leeng');
insert into words values(58, 4, 2, 'ໝີ/me');
insert into words values(59, 4, 2, 'ເປັດ/ped');
insert into words values(60, 4, 2, 'ກົບ/kop');

insert into words values(61, 5, 2, 'ເຕະບານ/te barn');
insert into words values(62, 5, 2, 'ເທັນນິດ/then nid');
insert into words values(63, 5, 2, 'ລັກບີ້/rag bi');
insert into words values(64, 5, 2, 'ຕີດອກປີກໄກ່/tee dork peek kai');
insert into words values(65, 5, 2, 'ລອຍນ້ຳ/loiy num');
insert into words values(66, 5, 2, 'ເບສບໍ່/base bor');
insert into words values(67, 5, 2, 'ສະເກັດ/sa ket');
insert into words values(68, 5, 2, 'ແລ່ນ/laen');
insert into words values(69, 5, 2, 'ບານບ້ວງ/barn buang');
insert into words values(70, 5, 2, 'ບານສົ່ງ/barn song');
insert into words values(71, 5, 2, 'ປິ່ງປ່ອງ/ping pong');
insert into words values(72, 5, 2, 'ຕີກອຟ/tee gof');
insert into words values(73, 5, 2, 'ຕີມວຍ/tee muay');
insert into words values(74, 5, 2, 'ໂບ່ລິ້ງ/bow ling');
insert into words values(75, 5, 2, 'ຮັອກກີ້/hok key');
-- /////////////////////////////////////////////////////////////////////////////
  insert into words values(1, 1, 5, 'Hola' );
  insert into words values(2, 1, 5, 'Adios' );
  insert into words values(3, 1, 5, 'Buenos Dias' );
  insert into words values(4, 1, 5, 'Buenas' );
  insert into words values(5, 1, 5, 'Buenas Tardes' );
  insert into words values(6, 1, 5, 'Buenas Noches' );
  insert into words values(7, 1, 5, '¿Como estas?' );
  insert into words values(8, 1, 5, 'Hace mucho que no nos vemos' );
  insert into words values(9, 1, 5, 'Mucho gusto' );
  insert into words values(10, 1, 5, 'Nos vemos mañana' );
  insert into words values(11, 1, 5, 'Perdon' );
  insert into words values(12, 1, 5, 'Gracias' );
  insert into words values(13, 1, 5, 'Buena suerte' );
  insert into words values(14, 1, 5, '¡Felicidades' );
  insert into words values(15, 1, 5, 'Cuidate' );

  insert into words values(16, 2, 5, 'Mesa' );
  insert into words values(17, 2, 5, 'Silla' );
  insert into words values(18, 2, 5, 'Refrigerador' );
  insert into words values(19, 2, 5, 'Sofa' );
  insert into words values(20, 2, 5, 'Carpeta' );
  insert into words values(21, 2, 5, 'Cama' );
  insert into words values(22, 2, 5, 'Reloj' );
  insert into words values(23, 2, 5, 'Espejo' );
  insert into words values(24, 2, 5, 'Lampara' );
  insert into words values(25, 2, 5, 'Closet' );
  insert into words values(26, 2, 5, 'Lavadora' );
  insert into words values(27, 2, 5, 'Television' );
  insert into words values(28, 2, 5, 'Escritorio' );
  insert into words values(29, 2, 5, 'Alacena' );
  insert into words values(30, 2, 5, 'Puerta' );

  insert into words values(31, 3, 5, 'Manzana' );
  insert into words values(32, 3, 5, 'Naranja' );
  insert into words values(33, 3, 5, 'Uva' );
  insert into words values(34, 3, 5, 'Fresa' );
  insert into words values(35, 3, 5, 'Melocoton' );
  insert into words values(36, 3, 5, 'Pera' );
  insert into words values(37, 3, 5, 'Mango' );
  insert into words values(38, 3, 5, 'Cereza' );
  insert into words values(39, 3, 5, 'Banana' );
  insert into words values(40, 3, 5, 'Kiwi' );
  insert into words values(41, 3, 5, 'Piña' );
  insert into words values(42, 3, 5, 'Coco' );
  insert into words values(43, 3, 5, 'Aguacate' );
  insert into words values(44, 3, 5, 'Ciruela' );
  insert into words values(45, 3, 5, 'Sandia' );

  insert into words values(46, 4, 5, 'Perro');
  insert into words values(47, 4, 5, 'Gato');
  insert into words values(48, 4, 5, 'Cerdo');
  insert into words values(49, 4, 5, 'Vaca');
  insert into words values(50, 4, 5, 'Pajaro');
  insert into words values(51, 4, 5, 'Pez');
  insert into words values(52, 4, 5, 'Elefante');
  insert into words values(53, 4, 5, 'Tigre');
  insert into words values(54, 4, 5, 'Serpiente');
  insert into words values(55, 4, 5, 'Girafa');
  insert into words values(56, 4, 5, 'Rata');
  insert into words values(57, 4, 5, 'Mono');
  insert into words values(58, 4, 5, 'Oso');
  insert into words values(59, 4, 5, 'Pato');
  insert into words values(60, 4, 5, 'Rana');

  insert into words values(61, 5, 5, 'Futbol');
  insert into words values(62, 5, 5, 'Tenis');
  insert into words values(63, 5, 5, 'Rugby');
  insert into words values(64, 5, 5, 'Badminton');
  insert into words values(65, 5, 5, 'Natacion');
  insert into words values(66, 5, 5, 'Beisbol');
  insert into words values(67, 5, 5, 'Patinaje');
  insert into words values(68, 5, 5, 'Correr');
  insert into words values(69, 5, 5, 'Basketball');
  insert into words values(70, 5, 5, 'Volleyball');
  insert into words values(71, 5, 5, 'Tenis de mesa');
  insert into words values(72, 5, 5, 'Golf');
  insert into words values(73, 5, 5, 'Boxeo');
  insert into words values(74, 5, 5, 'Boliche');
  insert into words values(75, 5, 5, 'Hockey sobre hielo');
-- /////////////////////////////////////////////////////////////////////////////
insert into words values(1, 1, 6, 'Салом/salom' );
insert into words values(2, 1, 6, 'Хайр/khair' );
insert into words values(3, 1, 6, 'Субҳ ба хайр/subh ba khair' );
insert into words values(4, 1, 6, 'Рӯз ба хайр/ruz ba khair' );
insert into words values(5, 1, 6, 'Шом ба хайр/shom ba khair' );
insert into words values(6, 1, 6, 'Шаб ба хайр/shab ba khair' );
insert into words values(7, 1, 6, 'Чӣ ҳол доред/chi hol dored ' );
insert into words values(8, 1, 6, 'Хело вақт шуд во нахӯрдем/khelo vaqt shud vo nakhurdem' );
insert into words values(9, 1, 6, 'Аз дидоратон шодам/az didoraton shodam' );
insert into words values(10, 1, 6, 'То пагоҳ/to pagoh');
insert into words values(11, 1, 6, 'Мебахшед/mebakhshed' );
insert into words values(12, 1, 6, 'Раҳмат/rahmat' );
insert into words values(13, 1, 6, 'Муваффақият/muvafaqiyat' );
insert into words values(14, 1, 6, 'Табрик/tabrik' );
insert into words values(15, 1, 6, 'Эҳтиёт кун/ehtiyot kun' );

insert into words values(16, 2, 6, 'Миз/miz' );
insert into words values(17, 2, 6, 'Курсӣ/kursi' );
insert into words values(18, 2, 6, 'Яхдон/yakhdon' );
insert into words values(19, 2, 6, 'Кат/kat' );
insert into words values(20, 2, 6, 'Гилем/gilem' );
insert into words values(21, 2, 6, 'Бистар/bistar' );
insert into words values(22, 2, 6, 'Соат/soat' );
insert into words values(23, 2, 6, 'Оина/oina' );
insert into words values(24, 2, 6, 'Чароғ/charogh' );
insert into words values(25, 2, 6, 'Ҷевон/jevon' );
insert into words values(26, 2, 6, 'Мошинаи ҷомашӯӣ/moshinai jomashui' );
insert into words values(27, 2, 6, 'Телевизион /televizion' );
insert into words values(28, 2, 6, 'Парта/parta' );
insert into words values(29, 2, 6, 'Ҷевон/jevon' );
insert into words values(30, 2, 6, 'Дар /dar' );

insert into words values(31, 3, 6, 'Себ/seb' );
insert into words values(32, 3, 6, 'Мандарин/mandarin' );
insert into words values(33, 3, 6, 'Ангур/angur' );
insert into words values(34, 3, 6, 'Қулфиной/qulfinoy' );
insert into words values(35, 3, 6, 'Шафтолу/shaftolu' );
insert into words values(36, 3, 6, 'Нок/nok' );
insert into words values(37, 3, 6, 'Манго/mango' );
insert into words values(38, 3, 6, 'Олуча /olucha' );
insert into words values(39, 3, 6, 'Банана /banana' );
insert into words values(40, 3, 6, 'Киви /kivi' );
insert into words values(41, 3, 6, 'Ананас /ananas' );
insert into words values(42, 3, 6, 'Норҷил /norjil' );
insert into words values(43, 3, 6, 'Авакадо /avacado' );
insert into words values(44, 3, 6, 'Олу/olu' );
insert into words values(45, 3, 6, 'Тарбуз/tarbuz' );

insert into words values(46, 4, 6, 'Саг/sag');
insert into words values(47, 4, 6, 'Гурба/gurba');
insert into words values(48, 4, 6, 'Хуг/khug');
insert into words values(49, 4, 6, 'Гов/gov');
insert into words values(50, 4, 6, 'Парранда/parranda');
insert into words values(51, 4, 6, 'Моҳӣ/mohi');
insert into words values(52, 4, 6, 'Фил/fil');
insert into words values(53, 4, 6, 'Паланг/palang');
insert into words values(54, 4, 6, 'Мор/mor');
insert into words values(55, 4, 6, 'Зарофа/zarofa');
insert into words values(56, 4, 6, 'Муш/mush');
insert into words values(57, 4, 6, 'Маймун/maymun');
insert into words values(58, 4, 6, 'Хирс/khirs');
insert into words values(59, 4, 6, 'Мурғобӣ/murghobi');
insert into words values(60, 4, 6, 'Қурбоққа/qurboqqa');

insert into words values(61, 5, 6, 'Футбол/futbol');
insert into words values(62, 5, 6, 'Теннис/tennis');
insert into words values(63, 5, 6, 'Регби/regbi');
insert into words values(64, 5, 6, 'Бадминтон /badminton');
insert into words values(65, 5, 6, 'Шиноварӣ/shinovari');
insert into words values(66, 5, 6, 'Бейсбол/beysbol');
insert into words values(67, 5, 6, 'Лижаронӣ/lijaroni');
insert into words values(68, 5, 6, 'Давидан/davidan');
insert into words values(69, 5, 6, 'Баскетбол/basketbol');
insert into words values(70, 5, 6, 'Волейбол/voleybol');
insert into words values(71, 5, 6, 'Тенниси рӯи миз/tennis rui miz');
insert into words values(72, 5, 6, 'Голф /golf');
insert into words values(73, 5, 6, 'Бокс/box');
insert into words values(74, 5, 6, 'Боулинг/bowling');
insert into words values(75, 5, 6, 'Хоккей/khokkey');
-- /////////////////////////////////////////////////////////////////////////////

insert into words values(1, 1, 4, 'こんにちは/konnichiwa' );
insert into words values(2, 1, 4, 'さようなら/sayounara' );
insert into words values(3, 1, 4, 'おはようございます/ohayougozaimasu' );
insert into words values(4, 1, 4, 'こんにちは/konnichiwa' );
insert into words values(5, 1, 4, 'こんばんは/kombanwa' );
insert into words values(6, 1, 4, 'おやすみ/oyasumi' );
insert into words values(7, 1, 4, 'おげんきですか/ogenkidesuka');
insert into words values(8, 1, 4, 'ひさしぶり/hisasiburi' );
insert into words values(9, 1, 4, 'はじめまして/hajimemasite' );
insert into words values(10, 1, 4, 'またあした/mata asita' );
insert into words values(11, 1, 4, 'ごめんなさい/gomen nasai' );
insert into words values(12, 1, 4, 'ありがとう/arigatou' );
insert into words values(13, 1, 4, 'がんばって/ganbatte' );
insert into words values(14, 1, 4, 'おめでとうございます/omedetougozaimasu');
insert into words values(15, 1, 4, 'おだいじに/odaijini' );

insert into words values(16, 2, 4, 'テーブル/table' );
insert into words values(17, 2, 4, 'いす/isu' );
insert into words values(18, 2, 4, 'れいぞうこ/reizouko' );
insert into words values(19, 2, 4, 'ソファー/sofa' );
insert into words values(20, 2, 4, 'カーペット/carpet' );
insert into words values(21, 2, 4, 'ベッド/bed' );
insert into words values(22, 2, 4, 'とけい/tokei' );
insert into words values(23, 2, 4, 'かがみ/kagami' );
insert into words values(24, 2, 4, 'ランプ/lamp' );
insert into words values(25, 2, 4, 'クローゼット/closet' );
insert into words values(26, 2, 4, 'せんたくき/sentakuki' );
insert into words values(27, 2, 4, 'テレビ/televi' );
insert into words values(28, 2, 4, 'つくえ/tsu ku e' );
insert into words values(29, 2, 4, 'しょっきだな/shockkidana' );
insert into words values(30, 2, 4, 'ドア/doa' );

insert into words values(31, 3, 4, 'りんご/ringo' );
insert into words values(32, 3, 4, 'みかん/mikan' );
insert into words values(33, 3, 4, 'ぶどう/budou' );
insert into words values(34, 3, 4, 'いちご/ichigo' );
insert into words values(35, 3, 4, 'もも/momo' );
insert into words values(36, 3, 4, 'なし/nashi' );
insert into words values(37, 3, 4, 'マンゴー/mango' );
insert into words values(38, 3, 4, 'さくらんぼ/sakuranbo' );
insert into words values(39, 3, 4, 'バナナ/banana' );
insert into words values(40, 3, 4, 'キウイ/kiui' );
insert into words values(41, 3, 4, 'パイナップル/pineapple' );
insert into words values(42, 3, 4, 'ココナッツ/coconut' );
insert into words values(43, 3, 4, 'アボカド/avocado' );
insert into words values(44, 3, 4, 'うめ/ume' );
insert into words values(45, 3, 4, 'スイカ/suika' );

insert into words values(46, 4, 4, 'いぬ/inu');
insert into words values(47, 4, 4, 'ねこ/neko');
insert into words values(48, 4, 4, 'ぶた/buta');
insert into words values(49, 4, 4, 'うし/ushi');
insert into words values(50, 4, 4, 'とり/tori');
insert into words values(51, 4, 4, 'さかな/sakana');
insert into words values(52, 4, 4, 'ぞう/zou');
insert into words values(53, 4, 4, 'とら/tora');
insert into words values(54, 4, 4, 'へび/hebi');
insert into words values(55, 4, 4, 'キリン/kirin');
insert into words values(56, 4, 4, 'ねずみ/nezumi');
insert into words values(57, 4, 4, 'さる/saru');
insert into words values(58, 4, 4, 'くま/kuma');
insert into words values(59, 4, 4, 'あひる/ahiru');
insert into words values(60, 4, 4, 'かえる/kaeru');

insert into words values(61, 5, 4, 'サッカー/soccer');
insert into words values(62, 5, 4, 'テニス/tennis');
insert into words values(63, 5, 4, 'ラグビー/rugby');
insert into words values(64, 5, 4, 'バドミントン/badminton');
insert into words values(65, 5, 4, 'すいえい/suiei');
insert into words values(66, 5, 4, 'やきゅう/yakyu');
insert into words values(67, 5, 4, 'スケート/skate');
insert into words values(68, 5, 4, 'ランニング/running');
insert into words values(69, 5, 4, 'バスケットボール/basketball');
insert into words values(70, 5, 4, 'バレーボール/volleyball');
insert into words values(71, 5, 4, 'たっきゅう/takkyu');
insert into words values(72, 5, 4, 'ゴルフ/golf');
insert into words values(73, 5, 4, 'ボクシング/boxing');
insert into words values(74, 5, 4, 'ボウリング/bowling');
insert into words values(75, 5, 4, 'アイスホッケー/ice hockey');
-- ////////////////////////////////////////////////////////////////////
insert into words values(1, 1, 7, '你好/ni hao' );
insert into words values(2, 1, 7, '再见/zai jian' );
insert into words values(3, 1, 7, '早上好/zao shang hao' );
insert into words values(4, 1, 7, '下午好/xia wu hao' );
insert into words values(5, 1, 7, '晚上好/wan shang hao' );
insert into words values(6, 1, 7, '晚安/wan an' );
insert into words values(7, 1, 7, '你好吗/ni hao ma' );
insert into words values(8, 1, 7, '好久不见/hao jiu bu jian' );
insert into words values(9, 1, 7, '很高兴见到你/hen gao xing jian dao ni' );
insert into words values(10, 1, 7, '明天见/ming tian jian' );
insert into words values(11, 1, 7, '对不起/dui bu qi' );
insert into words values(12, 1, 7, '谢谢/xie xie' );
insert into words values(13, 1, 7, '好运/hao yun' );
insert into words values(14, 1, 7, '恭喜/gong xi' );
insert into words values(15, 1, 7, '照顾/zhao gu' );

insert into words values(16, 2, 7, '桌子/zhuo zi' );
insert into words values(17, 2, 7, '椅子/yi zi' );
insert into words values(18, 2, 7, '星期五/xing qi wu' );
insert into words values(19, 2, 7, '沙发/sha fa' );
insert into words values(20, 2, 7, '毛毯/mao tan' );
insert into words values(21, 2, 7, '床/chuang' );
insert into words values(22, 2, 7, '闹钟/nao zhong' );
insert into words values(23, 2, 7, '镜子/jing zi' );
insert into words values(24, 2, 7, '台灯/tai deng' );
insert into words values(25, 2, 7, '壁橱/bi chu' );
insert into words values(26, 2, 7, '洗衣机/xi yi ji' );
insert into words values(27, 2, 7, '电视/dian shi' );
insert into words values(28, 2, 7, '书桌/shu zhuo' );
insert into words values(29, 2, 7, '橱柜/chu gui' );
insert into words values(30, 2, 7, '门/men' );

insert into words values(31, 3, 7, '苹果/ping guo' );
insert into words values(32, 3, 7, '橘子/ju zi' );
insert into words values(33, 3, 7, '葡萄/pu tao' );
insert into words values(34, 3, 7, '草莓/cao mei' );
insert into words values(35, 3, 7, '桃子/tao zi' );
insert into words values(36, 3, 7, '梨/li' );
insert into words values(37, 3, 7, '芒果/mang guo' );
insert into words values(38, 3, 7, '樱桃/ying tao' );
insert into words values(39, 3, 7, '香蕉/xiang jiao' );
insert into words values(40, 3, 7, '奇异果/qi yi guo' );
insert into words values(41, 3, 7, '菠萝/bo luo' );
insert into words values(42, 3, 7, '椰子/ye zi' );
insert into words values(43, 3, 7, '鳄梨/e li' );
insert into words values(44, 3, 7, '李子/li zi' );
insert into words values(45, 3, 7, '西瓜/xi gua' );

insert into words values(46, 4, 7, '狗/gou');
insert into words values(47, 4, 7, '猫/mao');
insert into words values(48, 4, 7, '猪/zhu');
insert into words values(49, 4, 7, '奶牛/nai niu');
insert into words values(50, 4, 7, '鸟/niao');
insert into words values(51, 4, 7, '鱼/yu');
insert into words values(52, 4, 7, '大象/da xiang');
insert into words values(53, 4, 7, '老虎/lao hu');
insert into words values(54, 4, 7, '蛇/she');
insert into words values(55, 4, 7, '长颈鹿/chang jing lu');
insert into words values(56, 4, 7, '蝙蝠/bian fu');
insert into words values(57, 4, 7, '猴子/hou zi');
insert into words values(58, 4, 7, '狗熊/gou xiong');
insert into words values(59, 4, 7, '鸭子/ya zi');
insert into words values(60, 4, 7, '青蛙/qing wa');

insert into words values(61, 5, 7, '足球/zu qiu');
insert into words values(62, 5, 7, '网球/wang qiu ');
insert into words values(63, 5, 7, '橄榄球/gan lan qiu');
insert into words values(64, 5, 7, '羽毛球/yu mao qiu');
insert into words values(65, 5, 7, '游泳/you yong');
insert into words values(66, 5, 7, '棒球/bang qiu');
insert into words values(67, 5, 7, '滑冰/hua bing');
insert into words values(68, 5, 7, '跑步/pao bu');
insert into words values(69, 5, 7, '篮球/lan qiu');
insert into words values(70, 5, 7, '排球/pai qiu');
insert into words values(71, 5, 7, '乒乓球/ping pong qiu ');
insert into words values(72, 5, 7, '高尔夫/gao er fu');
insert into words values(73, 5, 7, '拳击/quan ji');
insert into words values(74, 5, 7, '保龄球/bao ling qiu');
insert into words values(75, 5, 7, '冰球/bing qiu');
-- //////////////////////////////////////////////////////////////////////////////////////////////

  insert into words values(1, 1, 3, 'สวัสดี/swat di' );
  insert into words values(2, 1, 3, 'ลาก่อน/lakon' );
  insert into words values(3, 1, 3, 'สวัสดีตอนเช้า/swat di tonshao' );
  insert into words values(4, 1, 3, 'สวัสดีตอนบ่าย/swat di tonbaiy' );
  insert into words values(5, 1, 3, 'สวัสดีตอนเย็น/swat di tonyen' );
  insert into words values(6, 1, 3, 'ราตรีสวัสดิ์/ratri swat' );
  insert into words values(7, 1, 3, 'เป็นอย่างไรบ้าง​/pen yarng rai barng' );
  insert into words values(8, 1, 3, 'ไม่ได้เจอกันนานเลยนะ/mai dai jer kan narn lery na' );
  insert into words values(9, 1, 3, 'ยินดีที่ได้พบคุณ/yindi thi dai phob khun' );
  insert into words values(10, 1, 3, 'เจอกันพรุ่งนี้/jerkan phoung ny' );
  insert into words values(11, 1, 3, 'ขอโทษ/kho thod' );
  insert into words values(12, 1, 3, 'ขอบคุณ/khob khoun' );
  insert into words values(13, 1, 3, 'โชคดี/sok di' );
  insert into words values(14, 1, 3, 'ขอแสดงความยินดี/kho sadaeng khuam yindi' );
  insert into words values(15, 1, 3, 'ดูแล/du lae' );

  insert into words values(16, 2, 3, 'โต๊ะ/to' );
  insert into words values(17, 2, 3, 'เก้าอี้/kao i' );
  insert into words values(18, 2, 3, 'ตู้เย็น/tu yen' );
  insert into words values(19, 2, 3, 'โซฟา/sofa' );
  insert into words values(20, 2, 3, 'พรม/phom' );
  insert into words values(21, 2, 3, 'เตียง/tieng' );
  insert into words values(22, 2, 3, 'นาฬิกา/na li ka' );
  insert into words values(23, 2, 3, 'กระจก/ka jok' );
  insert into words values(24, 2, 3, 'ตะเกียง/ta kieng' );
  insert into words values(25, 2, 3, 'ตู้เสื้อผ้า/tu seua pha' );
  insert into words values(26, 2, 3, 'เครื่องซักผ้า/kheuang sak pha' );
  insert into words values(27, 2, 3, 'โทรทัศน์/tho la thad' );
  insert into words values(28, 2, 3, 'โต๊ะทำงาน/to tham ngarn' );
  insert into words values(29, 2, 3, 'ตู้/tu' );
  insert into words values(30, 2, 3, 'ประตู/pa tu' );

  insert into words values(31, 3, 3, 'แอปเปิ้ล/aep pern' );
  insert into words values(32, 3, 3, 'ส้ม/som' );
  insert into words values(33, 3, 3, 'องุ่น/a ngun' );
  insert into words values(34, 3, 3, 'สตรอเบอร์รี่/strawberry' );
  insert into words values(35, 3, 3, 'ลูกพีช/louk peace' );
  insert into words values(36, 3, 3, 'ลูกแพร์/louk phae' );
  insert into words values(37, 3, 3, 'มะม่วง/ma muang' );
  insert into words values(38, 3, 3, 'เชอร์รี่/cherry' );
  insert into words values(39, 3, 3, 'กล้วย/kuay' );
  insert into words values(40, 3, 3, 'กีวี่້/kiwi' );
  insert into words values(41, 3, 3, 'สัปปะรด/sap pa lod' );
  insert into words values(42, 3, 3, 'มะพร้าว/ma phao' );
  insert into words values(43, 3, 3, 'อาโวคาโด/avocado' );
  insert into words values(44, 3, 3, 'พลัม/plum' );
  insert into words values(45, 3, 3, 'แตงโม/taeng mo' );

  insert into words values(46, 4, 3, 'หมา/mar');
  insert into words values(47, 4, 3, 'แมว/meow');
  insert into words values(48, 4, 3, 'หมูູ/mu');
  insert into words values(49, 4, 3, 'วัว/vua');
  insert into words values(50, 4, 3, 'นก/nok');
  insert into words values(51, 4, 3, 'ปลา/pa');
  insert into words values(52, 4, 3, 'ช้าง/sarng');
  insert into words values(53, 4, 3, 'เสือ/seua');
  insert into words values(54, 4, 3, 'งู/ngu');
  insert into words values(55, 4, 3, 'ยีราฟ/yi raf');
  insert into words values(56, 4, 3, 'หนูູ/nu');
  insert into words values(57, 4, 3, 'ลิง/leeng');
  insert into words values(58, 4, 3, 'หมี/me');
  insert into words values(59, 4, 3, 'เป็ด/ped');
  insert into words values(60, 4, 3, 'กบ/kop');

  insert into words values(61, 5, 3, 'ฟุตบอล/fut ball');
  insert into words values(62, 5, 3, 'เทนนิส/tennis');
  insert into words values(63, 5, 3, 'รักบี้/rag bi');
  insert into words values(64, 5, 3, 'แบดมินตัน/badminton');
  insert into words values(65, 5, 3, 'ว่ายน้ำ/waiy nam');
  insert into words values(66, 5, 3, 'กีฬาเบสบอล/kila base ball');
  insert into words values(67, 5, 3, 'สเกต/sa ket');
  insert into words values(68, 5, 3, 'วิ่ง/ving');
  insert into words values(69, 5, 3, 'บาสเกตบอล/basketball');
  insert into words values(70, 5, 3, 'วอลเลย์บอล/volleyball');
  insert into words values(71, 5, 3, 'ปิงปอง/ping pong');
  insert into words values(72, 5, 3, 'กอล์ฟ/golf');
  insert into words values(73, 5, 3, 'มวย/muay');
  insert into words values(74, 5, 3, 'โบว์ลิ่ง/bow ling');
  insert into words values(75, 5, 3, 'ฮอกกี้ີ້/hok key');

    create table records (
      recordid int primary key auto_increment,
      recordmemname varchar(100) not null,
      recordstdlangid int,
      recordtopicid int,
      recordscore varchar(100) not null,
      recorddate datetime not null
    );
    insert into records values(null,'admin',1,1,'2/15','2018/01/21');
    insert into records values(null,'admin',2,2,'13/15','2018/01/21');
    insert into records values(null,'admin',3,3,'4/15','2018/01/21');
    insert into records values(null,'admin',4,4,'8/15','2018/01/21');
    insert into records values(null,'admin',5,5,'10/15','2018/01/21');
    insert into records values(null,'admin',6,1,'6/15','2018/01/21');
    insert into records values(null,'admin',7,2,'9/15','2018/01/21');
    insert into records values(null,'admin',1,2,'11/15','2018/01/21');

    create table mistakes (
      mwordid int not null,
      mlangid int not null,
      mcount int not null,
      mmem varchar(100) not null
    );
