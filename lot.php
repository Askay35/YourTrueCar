<article class="result-auto__article">
    <div class="result-auto__card">
        <div class="result-auto__image">
            <img class="result-auto__img" src="<?php if (isset($lot['img'])){echo $lot['img'];}else{echo "Не вказано";} ?>" alt="image">
        </div>
        <div class="result-auto__info">
            <div class="result-auto__info-top">
                <div class="result-auto__name">
                    <?php if (isset($lot['title'])):?>
                        <a href="<?php echo $lot['url']; ?>"><?php echo $lot['title']; ?></a>
                    <?php else: ?>
                        Не вказано
                    <?php endif; ?>
                </div>
                <div class="result-auto__date">
                    <div class="result-auto__date-title">Дата аукціону</div>
                    <div class="result-auto__date-num"><?php if (isset($lot['date'])){echo $lot['date'];}else{echo "Не вказано";} ?></div>
                </div>
            </div>
            <div class="result-auto__list">
                <div class="result-auto__item">
                    <img class="result-auto__item-image" src="assets/images/icon/calendar.svg">
                    <div class="result-auto__item-text"><?php if (isset($lot['god_vipuska'])){echo $lot['god_vipuska'];}else{echo "Не вказано";} ?></div>
                </div>
                <div class="result-auto__item">
                    <img class="result-auto__item-image" src="assets/images/icon/benzine.svg">
                    <div class="result-auto__item-text"><?php if (isset($lot['toplivo'])){echo $lot['toplivo'];}else{echo "Не вказано";} ?></div>
                </div>
                <div class="result-auto__item">
                    <img class="result-auto__item-image" src="assets/images/icon/road.svg">
                    <div class="result-auto__item-text"><?php if (isset($lot['probeg'])){echo $lot['probeg'];}else{echo "Не вказано";} ?></div>
                </div>
                <div class="result-auto__item">
                    <img class="result-auto__item-image" src="assets/images/icon/car-engine.svg">
                    <div class="result-auto__item-text"><?php if (isset($lot['dvigatel'])){echo $lot['dvigatel'];}else{echo "Не вказано";} ?></div>
                </div>
                <div class="result-auto__item">
                    <img class="result-auto__item-image" src="assets/images/icon/sedan.svg">
                    <div class="result-auto__item-text"><?php if (isset($lot['kuzov'])){echo $lot['kuzov'];}else{echo "Не вказано";} ?></div>
                </div>
                <div class="result-auto__item">
                    <img class="result-auto__item-image"
                         src="assets/images/icon/engineering.svg">
                    <div class="result-auto__item-text"><?php if (isset($lot['korobka'])){echo $lot['korobka'];}else{echo "Не вказано";} ?></div>
                </div>
                <div class="result-auto__item">
                    <img class="result-auto__item-image"
                         src="assets/images/icon/drive.png" style="filter:invert();width:30px;height:30px;">
                    <div class="result-auto__item-text"><?php if (isset($lot['privod'])){echo $lot['privod'];}else{echo "Не вказано";} ?></div>
                </div>
                <div class="result-auto__item">
                    <img class="result-auto__item-image" src="assets/images/icon/heart.svg">
                    <div class="result-auto__item-text"><?php if (isset($lot['problem'])){echo $lot['problem'];}else{echo "Не вказано";} ?></div>
                </div>
                <div class="result-auto__item">
                    <img class="result-auto__item-image"
                    src="assets/images/icon/damage.png" style="filter:invert();width:30px;height:30px;">
                    <div class="result-auto__item-text"><?php if (isset($lot['prichina'])){echo $lot['prichina'];}else{echo "Не вказано";} ?></div>
                </div>
            </div>
            <div class="result-auto__price">
                <img class="result-auto__price-image" src="assets/images/icon/money.svg">
                <div class="result-auto__item-num"><?php if (isset($lot['cena'])){echo $lot['cena'];}else{echo "Не вказано";} ?></div>
            </div>
            <div class="result-auto__buttons">
                <button class="result-auto__button btn-white" type="button">Тортуватись</button>
                <button class="result-auto__button btn-pink" type="button">Більше деталей</button>
            </div>
        </div>
    </div>
    <div class="result-auto__mobile">
        <div class="result-auto__date">
            <div class="result-auto__date-title">Дата аукціону:</div>
            <div class="result-auto__date-num"><?php if (isset($lot['date'])){echo $lot['date'];}else{echo "Не вказано";} ?></div>
        </div>
        <div class="result-auto__list">
            <div class="result-auto__item">
                <img class="result-auto__item-image" src="assets/images/icon/calendar.svg">
                <div class="result-auto__item-text"><?php if (isset($lot['god_vipuska'])){echo $lot['god_vipuska'];}else{echo "Не вказано";} ?></div>
            </div>
            <div class="result-auto__item">
                <img class="result-auto__item-image" src="assets/images/icon/benzine.svg">
                <div class="result-auto__item-text"><?php if (isset($lot['toplivo'])){echo $lot['toplivo'];}else{echo "Не вказано";} ?></div>
            </div>
            <div class="result-auto__item">
                <img class="result-auto__item-image" src="assets/images/icon/road.svg">
                <div class="result-auto__item-text"><?php if (isset($lot['probeg'])){echo $lot['probeg'];}else{echo "Не вказано";} ?></div>
            </div>
            <div class="result-auto__item">
                <img class="result-auto__item-image" src="assets/images/icon/car-engine.svg">
                <div class="result-auto__item-text"><?php if (isset($lot['dvigatel'])){echo $lot['dvigatel'];}else{echo "Не вказано";} ?></div>
            </div>
            <div class="result-auto__item">
                <img class="result-auto__item-image" src="assets/images/icon/sedan.svg">
                <div class="result-auto__item-text"><?php if (isset($lot['kuzov'])){echo $lot['kuzov'];}else{echo "Не вказано";} ?></div>
            </div>
            <div class="result-auto__item">
                <img class="result-auto__item-image" src="assets/images/icon/engineering.svg">
                <div class="result-auto__item-text"><?php if (isset($lot['korobka'])){echo $lot['korobka'];}else{echo "Не вказано";} ?></div>
            </div>
            <div class="result-auto__item">
                <img class="result-auto__item-image"
                     src="assets/images/icon/drive.png" style="filter:invert();width:30px;height:30px;">
                <div class="result-auto__item-text"><?php if (isset($lot['privod'])){echo $lot['privod'];}else{echo "Не вказано";} ?></div>
            </div>
            <div class="result-auto__item">
                <img class="result-auto__item-image" src="assets/images/icon/heart.svg">
                <div class="result-auto__item-text"><?php if (isset($lot['problem'])){echo $lot['problem'];}else{echo "Не вказано";} ?></div>
            </div>
            <div class="result-auto__item">
                <img class="result-auto__item-image"
                src="assets/images/icon/damage.png" style="filter:invert();width:30px;height:30px;">
                <div class="result-auto__item-text"><?php if (isset($lot['prichina'])){echo $lot['prichina'];}else{echo "Не вказано";} ?></div>
            </div>
        </div>
    </div>
    <button class="result-auto__arrow" type="button">
        <img class="result-auto__arrow-image" src="assets/images/icon/arrow-auto.svg">
    </button>
</article>