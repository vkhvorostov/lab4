<?php

class CNews
{

    /**
     * @var mysqli Соединение с БД
     */
    protected $mysqli;
    /**
     * @var string URL списка новостей
     */
    protected $baseUrl;

    /**
     * CNews constructor.
     * @param mysqli $mysqli Соединение с БД
     * @param string $url URL списка новостей
     */
    public function __construct(mysqli $mysqli, $url)
    {
        $this->mysqli = $mysqli;
        $this->baseUrl = $url;
    }

    /**
     * Выводит полный текст одной новости
     * @param int $newsId ID новости
     */
    public function printOne($newsId)
    {
        $res = $this->mysqli->query("select * from news where id=$newsId");
        $data = $res->fetch_assoc();
        $res->close();
        ?>
        <div class="news-list">
            <h1><?= $data['header'] ?></h1>
            <div class="date"><?= $data['datef'] ?></div>
            <div class="full-text"><?= nl2br($data['full_text']) ?></div>
            <div class="back-link"><a href="<?= $this->baseUrl ?>">Назад к списку новостей</a></div>
        </div>
        <?
    }

    /**
     * Выводит список новостей
     */
    public function printAll()
    {
        $sql = "select *, date_format(`date_row`,'%d.%m.%Y') as datef from news where mode=0 order by `date_row` desc";
        $res = $this->mysqli->query($sql);
        ?>
        <div class="news-list"><?
        while ($data = $res->fetch_assoc()) {
            ?>
            <div class="item">
                <div class="date"><?= $data['datef'] ?></div>
                <div class="header"><a href="<?= $this->baseUrl . $data['id'] ?>/"><?= $data['header'] ?></a></div>
                <div class="short-text"><?= $data['short_text'] ?></div>
            </div>
            <?
        }
        ?></div><?
        $res->close();
    }

}