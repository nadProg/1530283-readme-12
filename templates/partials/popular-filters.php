<div class="popular__filters-wrapper">
    <div class="popular__sorting sorting">
        <b class="popular__sorting-caption sorting__caption">Сортировка:</b>
        <ul class="popular__sorting-list sorting__list">
            <?php
            foreach ($sort_types as $sort_type): ?>
                <li class="sorting__item">
                    <a class="sorting__link <?= $sort_type['active']
                        ? 'sorting__link--active'
                        : '' ?> <?= $is_sort_order_reversed
                        ? 'sorting__link--reverse' : '' ?>"
                       href="<?= $sort_type['url'] ?>">
                        <span><?= $sort_type['label'] ?></span>
                        <svg class="sorting__icon" width="10" height="12">
                            <use xlink:href="#icon-sort"></use>
                        </svg>
                    </a>
                </li>
            <?php
            endforeach; ?>
        </ul>
    </div>
    <div class="popular__filters filters">
        <b class="popular__filters-caption filters__caption">Тип контента:</b>
        <ul class="popular__filters-list filters__list">
            <li class="popular__filters-item popular__filters-item--<?= $any_content_filter['icon'] ?> filters__item filters__item--<?= $any_content_filter['icon'] ?>">
                <a class="filters__button filters__button--ellipse filters__button--all <?= $any_content_filter['active']
                    ? 'filters__button--active' : '' ?>"
                   href="<?= $any_content_filter['url'] ?>">
                    <span><?= $any_content_filter['name'] ?></span>
                </a>
            </li>
            <?php
            foreach ($content_filters as $content_filter): ?>
                <li class="popular__filters-item filters__item">
                    <a class="filters__button filters__button--<?= $content_filter['icon'] ?> <?= $content_filter['active']
                        ? 'filters__button--active' : '' ?> button"
                       href="<?= $content_filter['url'] ?>">
                        <span class="visually-hidden"><?= $content_filter['name'] ?></span>
                        <svg class="filters__icon" width="22" height="18">
                            <use xlink:href="#icon-filter-<?= $content_filter['icon'] ?>"></use>
                        </svg>
                    </a>
                </li>
            <?php
            endforeach; ?>
        </ul>
    </div>
</div>
