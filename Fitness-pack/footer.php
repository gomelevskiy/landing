<footer id="footer" class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="logo">
                    <a href="/"><?php the_field('logo',5); ?></a>
                </div>
                <div class="footer-contacts">
                    <div><a href="tel:<?php the_field('phone',11); ?>"><?php the_field('phone',11); ?></a></div>
                    <div><a href="mailto:hello@fitnesspack.ru"><?php the_field('email',11); ?></a></div>
                    <div><p><?php the_field('address',11); ?></p></div>
                </div>
                <p class="footer-text">
                    При использовании материалов сайта обязательным условием является
                    наличие гиперссылки в пределах первого абзаца на страницу расположения
                    исходной статьи с указанием бренда
                </p>
                <p class="footer-text">
                    Создание сайта - <a target="_blank" href="https://gomelevskij.ru/">Гомелевский Алексей</a><br/>
                    Дизайн сайта -  <a target="_blank" href="https://zvadim.ru/">Злыгастев Вадим</a>
                </p>
                <div class="footer-copyright">© 2017 FitnessPack</div>
            </div>
            <div class="col-md-5">
                <ul class="footer-social">
                    <?php if( get_field('social_vk',11) ): ?>
                    <li class="footer-social-item vk"><a href="<?php the_field('social_vk',11); ?>"></a></li>
                    <?php endif; ?>
                    <?php if( get_field('social_yt',11) ): ?>
                    <li class="footer-social-item yt"><a href="<?php the_field('social_yt',11); ?>"></a></li>
                    <?php endif; ?>
                    <?php if( get_field('social_fb',11) ): ?>
                    <li class="footer-social-item fb"><a href="<?php the_field('social_fb',11); ?>"></a></li>
                    <?php endif; ?>
                    <?php if( get_field('social_inst',11) ): ?>
                    <li class="footer-social-item inst"><a href="<?php the_field('social_inst',11); ?>"></a></li>
                    <?php endif; ?>
                </ul>
                <a href="#" class="footer_btn-line">Подписаться на рассылку</a>
            </div>
        </div>
    </div>
</footer>

<div class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-close"></div>
        <div class="modal-content">
            <?php the_field('feedback',11); ?>
        </div>
    </div>
</div>

<script src="<?php bloginfo('template_directory'); ?>/lib/jquery/jquery.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/lib/bootstrap/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/lib/maskedinput/jquery.maskedinput.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/lib/animate/wow.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/lib/animate/plugins.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>
</body>
</html>