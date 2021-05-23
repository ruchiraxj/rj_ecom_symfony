<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210523132318 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE books ADD author VARCHAR(255) NOT NULL');


        $this->addSql('Insert into category (category_name) VALUES("Children")');
        $this->addSql('Insert into category (category_name) VALUES("Fiction")');

        $books = [0=>['book_name'=>'Alice\'s Adventures in Wonderland','category_id'=>1,'isbn'=>'584-8-146227-1-0','price'=>21,'qty'=>16,'author'=>'Lewis Carroll','book_cover'=>'',],1=>['book_name'=>'Max and Moritz','category_id'=>1,'isbn'=>'109-4-476201-2-7','price'=>9,'qty'=>7,'author'=>'Wilhelm Busch','book_cover'=>'',],2=>['book_name'=>'Hans Brinker or the Silver Skates','category_id'=>1,'isbn'=>'697-5-463956-0-2','price'=>18,'qty'=>20,'author'=>'Mary Mapes Dodge','book_cover'=>'',],3=>['book_name'=>'Little Women','category_id'=>1,'isbn'=>'953-7-817870-1-5','price'=>22,'qty'=>18,'author'=>'Louisa May Alcott','book_cover'=>'',],4=>['book_name'=>'Ragged Dick','category_id'=>1,'isbn'=>'377-2-819335-0-9','price'=>1,'qty'=>16,'author'=>'Horatio Alger, Jr.','book_cover'=>'',],5=>['book_name'=>'Lorna Doone','category_id'=>1,'isbn'=>'662-2-455341-2-5','price'=>29,'qty'=>20,'author'=>'R. D. Blackmore','book_cover'=>'',],6=>['book_name'=>'Mrs. Overtheway\'s Remembrances','category_id'=>1,'isbn'=>'106-6-497911-0-2','price'=>8,'qty'=>10,'author'=>'Juliana Horatia Ewing','book_cover'=>'',],7=>['book_name'=>'Twenty Thousand Leagues under the Sea','category_id'=>1,'isbn'=>'998-0-735646-1-9','price'=>16,'qty'=>6,'author'=>'Jules Verne','book_cover'=>'',],8=>['book_name'=>'At the Back of the North Wind','category_id'=>1,'isbn'=>'375-8-495563-0-9','price'=>6,'qty'=>18,'author'=>'George MacDonald','book_cover'=>'',],9=>['book_name'=>'Brownie (folklore)|The Brownies and other Tales','category_id'=>1,'isbn'=>'871-6-946518-2-9','price'=>28,'qty'=>1,'author'=>'Juliana Horatia Ewing','book_cover'=>'',],10=>['book_name'=>'The Princess and the Goblin','category_id'=>1,'isbn'=>'225-5-551415-2-8','price'=>8,'qty'=>12,'author'=>'George MacDonald','book_cover'=>'',],11=>['book_name'=>'Through the Looking-Glass','category_id'=>1,'isbn'=>'859-3-983982-0-1','price'=>15,'qty'=>9,'author'=>'Lewis Carroll','book_cover'=>'',],12=>['book_name'=>'Around the World in Eighty Days','category_id'=>1,'isbn'=>'900-2-396319-1-0','price'=>8,'qty'=>15,'author'=>'Jules Verne','book_cover'=>'',],13=>['book_name'=>'A Dog of Flanders','category_id'=>1,'isbn'=>'590-2-376382-1-1','price'=>29,'qty'=>8,'author'=>'Ouida','book_cover'=>'',],14=>['book_name'=>'What Katy Did','category_id'=>1,'isbn'=>'519-5-250832-1-9','price'=>23,'qty'=>2,'author'=>'Susan Coolidge','book_cover'=>'',],15=>['book_name'=>'The Adventures of Tom Sawyer','category_id'=>1,'isbn'=>'749-8-852567-1-6','price'=>18,'qty'=>3,'author'=>'Mark Twain','book_cover'=>'',],16=>['book_name'=>'Black Beauty','category_id'=>1,'isbn'=>'641-8-195871-0-2','price'=>1,'qty'=>17,'author'=>'Anna Sewell','book_cover'=>'',],17=>['book_name'=>'The Prince and the Pauper','category_id'=>1,'isbn'=>'383-0-129373-0-5','price'=>26,'qty'=>19,'author'=>'Mark Twain','book_cover'=>'',],18=>['book_name'=>'The Adventures of Pinocchio','category_id'=>1,'isbn'=>'952-7-914529-1-7','price'=>6,'qty'=>17,'author'=>'Carlo Collodi','book_cover'=>'',],19=>['book_name'=>'The Merry Adventures of Robin Hood','category_id'=>1,'isbn'=>'764-7-671463-1-3','price'=>25,'qty'=>15,'author'=>'Howard Pyle','book_cover'=>'',],20=>['book_name'=>'Uncle Remus|Nights with Uncle Remus','category_id'=>1,'isbn'=>'560-9-476772-1-1','price'=>29,'qty'=>1,'author'=>'Joel Chandler Harris','book_cover'=>'',],21=>['book_name'=>'Treasure Island','category_id'=>1,'isbn'=>'498-1-270877-2-2','price'=>29,'qty'=>2,'author'=>'Robert Louis Stevenson','book_cover'=>'',],22=>['book_name'=>'Adventures of Huckleberry Finn','category_id'=>1,'isbn'=>'799-2-376644-1-8','price'=>19,'qty'=>9,'author'=>'Mark Twain','book_cover'=>'',],23=>['book_name'=>'Heidi','category_id'=>1,'isbn'=>'854-1-320803-1-6','price'=>27,'qty'=>18,'author'=>'Johanna Spyri','book_cover'=>'',],24=>['book_name'=>'King Solomon\'s Mines','category_id'=>1,'isbn'=>'656-4-755466-1-8','price'=>23,'qty'=>13,'author'=>'H. Rider Haggard','book_cover'=>'',],25=>['book_name'=>'Kidnapped (novel)|Kidnapped','category_id'=>1,'isbn'=>'371-1-953663-1-7','price'=>3,'qty'=>2,'author'=>'Robert Louis Stevenson','book_cover'=>'',],26=>['book_name'=>'Fahrenheit 451','category_id'=>2,'isbn'=>'257-0-872838-2-8','price'=>21,'qty'=>6,'author'=>'Ray Bradbury','book_cover'=>'',],27=>['book_name'=>'The Paying Guests','category_id'=>2,'isbn'=>'164-5-457986-0-9','price'=>6,'qty'=>9,'author'=>'Sarah Waters','book_cover'=>'',],28=>['book_name'=>'Jane Eyre','category_id'=>2,'isbn'=>'368-2-130750-2-3','price'=>16,'qty'=>19,'author'=>'Charlotte Brontë','book_cover'=>'',],29=>['book_name'=>'Watership Down','category_id'=>2,'isbn'=>'787-5-563470-0-3','price'=>16,'qty'=>10,'author'=>'Richard Adams','book_cover'=>'',],30=>['book_name'=>'Lord of the Flies','category_id'=>2,'isbn'=>'640-2-929667-1-9','price'=>13,'qty'=>14,'author'=>'William Golding','book_cover'=>'',],31=>['book_name'=>'Americanah','category_id'=>2,'isbn'=>'239-6-114457-0-4','price'=>29,'qty'=>5,'author'=>'Chimamanda Ngozi Adichie','book_cover'=>'',],32=>['book_name'=>'A Town Like Alice','category_id'=>2,'isbn'=>'603-2-931730-2-8','price'=>10,'qty'=>20,'author'=>'Nevil Shute','book_cover'=>'',],33=>['book_name'=>'The Vegetarian','category_id'=>2,'isbn'=>'912-9-244178-2-6','price'=>15,'qty'=>3,'author'=>'Han Kang','book_cover'=>'',],34=>['book_name'=>'The Adventures of Huckleberry Finn','category_id'=>2,'isbn'=>'680-0-365526-2-3','price'=>18,'qty'=>18,'author'=>'Mark Twain','book_cover'=>'',],35=>['book_name'=>'Anne of Green Gables','category_id'=>2,'isbn'=>'340-3-453312-1-1','price'=>3,'qty'=>10,'author'=>'Lucy Maud Montgomery','book_cover'=>'',],36=>['book_name'=>'Adventures of Sherlock Holmes','category_id'=>2,'isbn'=>'821-9-850187-2-1','price'=>15,'qty'=>16,'author'=>'Arthur Conan Doyle','book_cover'=>'',],37=>['book_name'=>'The Alchemist','category_id'=>2,'isbn'=>'815-2-760992-0-4','price'=>17,'qty'=>16,'author'=>'Paulo Coelho','book_cover'=>'',],38=>['book_name'=>'The Color Purple','category_id'=>2,'isbn'=>'257-9-171500-0-6','price'=>2,'qty'=>6,'author'=>'Alice Walker','book_cover'=>'',],39=>['book_name'=>'All Quiet on the Western Front','category_id'=>2,'isbn'=>'532-8-149527-2-4','price'=>24,'qty'=>6,'author'=>'Erich Maria Remarque','book_cover'=>'',],40=>['book_name'=>'Frankenstein','category_id'=>2,'isbn'=>'763-2-726012-0-9','price'=>2,'qty'=>11,'author'=>'Mary Shelley','book_cover'=>'',],41=>['book_name'=>'All the Light We Cannot See','category_id'=>2,'isbn'=>'725-9-292588-2-0','price'=>6,'qty'=>10,'author'=>'Anthony Doerr','book_cover'=>'',],];
        foreach ($books as $b) {
            $this->addSql('INSERT INTO books (book_name, category_id, isbn, price, qty, author, book_cover) VALUES ("'.$b['book_name'].'", "'.$b['category_id'].'", "'.$b['isbn'].'", "'.$b['price'].'", "'.$b['qty'].'", "'.$b['author'].'", "'.$b['book_cover'].'")');
        }


    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE books DROP author');
    }
}
