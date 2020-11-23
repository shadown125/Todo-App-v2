<div class="progression-content">

</div>
<section class="todos">
    <div class="todos-header">
        <h3 class="h3 headline">In progression</h3>
        <a href="./" class="button"></a>
        <div class="description">Today</div>
    </div>
    <div class="todos-wrapper">
        <ul>
            <?php foreach($params['todo'] ?? [] as $note): ?>
            <li>
                <div class="header">
                    <div class="circle"></div>
                    <h3 class="h3 headline"><?php echo $note['title']; ?></h3>
                    <button class="button-complete"></button>
                    <button class="button-edit"></button>
                    <button class="button-delete"></button>
                </div>
                <div class="description"><?php echo $note['description']; ?></div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
