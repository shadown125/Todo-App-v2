<section class="progression-content">
    <div class="date-wrapper">
        <div class="day"><?php echo date('d'); ?></div>
        <div class="month"><?php echo strtoupper(date('M')); ?></div>
    </div>
    <div class="content-wrapper">
        <h2 class="headline h2">Today's Tasks</h2>
        <div class="progression-bar"><div class="progressed"></div></div>
        <div class="additional-data-wrapper">
            <div class="done">Done Todo: <span class="doneCounter"><?php echo count($params['doneTodos']); ?></span></div>
            <?php if(strpos("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", '/done-todo') === false): ?>
                <div class="todo">Must do: <span class="todoCounter"><?php echo count($params['todo']); ?></span></div>
            <?php endif; ?>
        </div>
    </div>
</section>