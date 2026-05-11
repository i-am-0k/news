<?php if (!empty($latestNews)): ?>
    <div class="latest-news" style="background-image: url('/uploads/<?= htmlspecialchars($latestNews['image']) ?>')">
        <h2 class="latest-news__title"><?= htmlspecialchars($latestNews['title']) ?></h2>
        <?php
        $announce = str_replace(['[p]', '[/p]'], ['<p class="latest-news__text">', '</p>'], $latestNews['announce']);
        echo $announce;
        ?>
    </div>
    <?php endif; ?>
    <section class="news">
        <h1 class="title">Новости</h1>
        <?php if (!empty($newsList)): ?>
            <div class="news__list">
                <?php foreach ($newsList as $item): ?>
                    <div class="news__card">
                        <div class="news__content">
                            <p class="news__date"><?= date('d.m.Y', strtotime($item['date'])) ?></p>
                            <h3 class="news__title"><?= htmlspecialchars($item['title']) ?></h3>
                            <div class="news__announce">
                                <?php
                                $announce = str_replace(['[p]', '[/p]'], ['<p>', '</p>'], $item['announce']);
                                echo $announce;
                                ?>
                            </div>
                        </div>
                        <a href="/news/<?= $item['id'] ?>" class="news__link">
                            Подробнее
                            <svg width="27" height="15" viewBox="0 0 27 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 6.36395C0.447715 6.36395 4.82823e-08 6.81167 0 7.36395C-4.82823e-08 7.91624 0.447715 8.36395 1 8.36395L1 6.36395ZM26.707 8.07106C27.0975 7.68054 27.0975 7.04737 26.707 6.65685L20.343 0.292887C19.9525 -0.0976379 19.3193 -0.097638 18.9288 0.292886C18.5383 0.683411 18.5383 1.31658 18.9288 1.7071L24.5857 7.36395L18.9288 13.0208C18.5383 13.4113 18.5383 14.0445 18.9288 14.435C19.3193 14.8255 19.9525 14.8255 20.343 14.435L26.707 8.07106ZM1 8.36395L25.9999 8.36395L25.9999 6.36395L1 6.36395L1 8.36395Z" fill="white"/>
                            </svg>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php if ($paginator && $paginator->getTotalPages() > 1): ?>
                <div class="news__pagination">
                    <?php if ($paginator->hasPrev()): ?>
                        <a href="?page=<?= $paginator->getPrevPage() ?>" class="news__prev-next news__prev-next--reverse">
                            <svg viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 6.36401C0.447715 6.36401 -4.82823e-08 6.81173 0 7.36401C4.82823e-08 7.9163 0.447715 8.36401 1 8.36401L1 6.36401ZM16.466 8.07112C16.8565 7.68059 16.8565 7.04743 16.466 6.65691L10.102 0.292945C9.7115 -0.0975793 9.07834 -0.0975792 8.68781 0.292945C8.29729 0.68347 8.29729 1.31663 8.68781 1.70716L14.3447 7.36401L8.68781 13.0209C8.29729 13.4114 8.29729 14.0446 8.68781 14.4351C9.07834 14.8256 9.7115 14.8256 10.102 14.4351L16.466 8.07112ZM1 8.36401L15.7589 8.36401L15.7589 6.36401L1 6.36401L1 8.36401Z" fill="none"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php foreach ($paginator->getPageRange() as $i): ?>
                        <a href="?page=<?= $i ?>" class="news__page <?= $i == $paginator->getCurrentPage() ? 'active' : '' ?>"><?= $i ?></a>
                    <?php endforeach; ?>
                    <?php if ($paginator->hasNext()): ?>
                        <a href="?page=<?= $paginator->getNextPage() ?>" class="news__prev-next">
                            <svg viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 6.36401C0.447715 6.36401 -4.82823e-08 6.81173 0 7.36401C4.82823e-08 7.9163 0.447715 8.36401 1 8.36401L1 6.36401ZM16.466 8.07112C16.8565 7.68059 16.8565 7.04743 16.466 6.65691L10.102 0.292945C9.7115 -0.0975793 9.07834 -0.0975792 8.68781 0.292945C8.29729 0.68347 8.29729 1.31663 8.68781 1.70716L14.3447 7.36401L8.68781 13.0209C8.29729 13.4114 8.29729 14.0446 8.68781 14.4351C9.07834 14.8256 9.7115 14.8256 10.102 14.4351L16.466 8.07112ZM1 8.36401L15.7589 8.36401L15.7589 6.36401L1 6.36401L1 8.36401Z" fill="none"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </section>