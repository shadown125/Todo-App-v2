<div class="content-container">
    <?php require_once('templates/includes/progression.php');?>
    <section class="todos">
        <div class="todos-header">
            <h3 class="h3 headline">In progression</h3>
            <a href="./#todo-popup" class="button add-todo"></a>
            <div class="description">Today</div>
        </div>
        <div class="todos-wrapper">
            <ul>
                <?php foreach($params['todo'] ?? [] as $note): ?>
                <li>
                    <div class="header">
                        <div class="circle"></div>
                        <h3 class="h3 headline"><?php echo $note['title']; ?></h3>
                        <form action="./?action=doneTodo" method="post">
                            <input type="hidden" name="id" value="<?php echo $note['id'];?>">
                            <button class="button-complete"></button>
                        </form>
                        <form action="./?action=getEditTodo" method="post">
                            <input type="hidden" name="id" value="<?php echo $note['id'];?>">
                            <button class="button-edit"></button>
                        </form>
                        <form action="./?action=delete" method="post">
                            <input type="hidden" name="id" value="<?php echo $note['id'];?>">
                            <button class="button-delete"></button>
                        </form>
                    </div>
                    <div class="description"><?php echo $note['description']; ?></div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
</div>