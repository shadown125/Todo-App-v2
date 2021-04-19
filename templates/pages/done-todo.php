<div class="content-container">
    <?php require_once('templates/includes/progression.php');?>
    <section class="todos">
        <div class="todos-header">
            <h3 class="h3 headline">Completed Todos</h3>
            <div class="description">Today</div>
        </div>
        <div class="todos-wrapper">
            <ul>
                <?php foreach($params['doneTodos'] as $doneTodo): ?>
                <li>
                    <div class="header">
                        <div class="circle"></div>
                        <h3 class="h3 headline"><?php echo $doneTodo['title']; ?></h3>
                        <form action="./?action=deleteDoneTodos" method="post">
                            <input type="hidden" name="id" value="<?php echo $doneTodo['id']; ?>">
                            <button class="button-delete"></button>
                        </form>
                    </div>
                    <div class="description"><?php echo $doneTodo['description']; ?></div>
                    <div class="created"><?php echo $doneTodo['created_at']; ?></div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
</div>