<?php
use yii\db\Migration;

class m150829_145221_create_film_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%film}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64)->notNull(),
            'description' => $this->text()->notNull(),
            'release_year' => $this->integer(4)->notNull(),
        ], $tableOptions);

        $this->batchInsert('{{%film}}', ['id', 'title', 'description', 'release_year'], [
            [1, 'Interstellar', "A team of explorers travel through a wormhole in space in an attempt to ensure humanity's survival.", 2014],
            [2, "Harry Potter and the Philosopher's Stone", "Harry Potter is an orphaned boy brought up by his unfriendly aunt and uncle...", 2001],
            [3, "Back to the Future", "A young man is accidentally sent 30 years into the past in a time-traveling DeLorean invented by his friend, Dr. Emmett Brown, and must make sure his high-school-age parents unite in order to save his own existence.", 1985],
            [4, "Blade Runner", "A blade runner must pursue and try to terminate four replicants who stole a ship in space and have returned to Earth to find their creator.", 1982],
            [5, "Dallas Buyers Club", "In 1985 Dallas, electrician and hustler Ron Woodroof works around the system to help AIDS patients get the medication they need after he is diagnosed with the disease.", 2013],
        ]);

    }

    public function down()
    {
        $this->dropTable('film');
    }
}