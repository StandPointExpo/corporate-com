<?php

use Illuminate\Support\Collection;
use Illuminate\Database\Seeder;
use App\Page;

class PagesSeeder extends Seeder
{
       /* `corporate`.`pages` */
        private $pages = array(
            array('id' => '1',
                'language_id' => '1',
                'name' => 'main-page',
                'site_title' => 'StandPoint - Production of exhibition stands',
                'description' => NULL,
                'articles' => array('language_id' => NULL,'name' => 'first-text','text' => "<p>During 2019 year our company took part in 74 exhibition fairs and events in Ukraine, Germany, Italy, Switzerland and has built 127,993 sq. meters of the exhibition stands.</p>
<p>StandPoint became the official general developer of Eurovision in Ukraine, in 2017.</p>
<p>We have a powerful production base and a warehouse of exhibition equipment (2500 and 5000 square meters respectively).</p>
<p>We are the structural subdivision of the International Exhibition Center- the biggest exhibition platform in Ukraine and the general developer of exhibitions held in the IEC (International Exhibition Center). </p>
<p>Our own design studio and design office have a vast experience in developing stands for exhibitions, our stands have many awards and certificates: we will find solutions to any problems.</p>"),
            ),
            array('id' => '2',
                'language_id' => '2',
                'name' => 'main-page',
                'site_title' => 'StandPoint - Виробництво виставкових стендів',
                'description' => NULL,
                'articles' => array('language_id' => NULL,'name' => 'first-text','text' => "<p>Ми вже 15 років будуємо виставки та створюємо ексклюзивні виставкові майданчики для найбільших компаній.</p>
<p>Протягом 2019 року наша компанія взяла участь у 74 виставкових заходах в Україні, Німеччині, Італії, Швейцарії та побудувала 127 993 квадратних метри виставкових стендів.</p>
<p>StandPoint став офіційним генеральним забудовником Євробачення в Україні у 2017 році.</p>
<p>У нас є потужна виробнича база та склад виставкового обладнання (2500 і 5000 квадратних метрів відповідно).</p>
<p>Ми є структурним підрозділом Міжнародного виставкового центру - найбільшої виставкової платформи в Україні та генеральним забудовником виставок, що проводяться в МВЦ (Міжнародний виставковий центр).</p>
<p>Власна дизайнерська студія та дизайнерський офіс мають великий досвід розробки стендів для виставок, наші стенди мають багато нагород та сертифікатів: ми знайдемо рішення будь-яких проблем.</p>"))
        );

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $start = now();
        $this->command->info('Pages Seeder Started...');
        foreach ($this->pages as $page) {
            $pageCollect = collect($page);
            $result = Page::create([
                'id'      => $pageCollect->get('id'),
                'language_id'  => $pageCollect->get('language_id'),
                'name'  => $pageCollect->get('name'),
                'site_title'     => $pageCollect->get('site_title'),
                'description' => NULL
            ]);
            $result->articles()->create($page['articles']);
        }

        $this->command->info('Time completed:   '.$start->diffForHumans(null, true));
    }
}
