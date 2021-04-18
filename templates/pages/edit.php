<div class="todo-popup edit" id="todo-popup">
    <div class="content">
        <a href="./" class="button"></a>
        <form action="./?action=editSelectedTodo" class="add-todo" method="post">
            <input type="hidden" name="id" value="<?php echo $params['id'];?>">
            <div>
                <label for="title">Title: <sup>*</sup></label>
                <input type="text" name="title" class="title"
                       value="<?php echo $params['title']; ?>" id="title" placeholder="Task name" required>
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="description"
                          placeholder="Description text for your Task (Optional)"><?php echo $params['description']; ?></textarea>
            </div>
            <div>
                <button class="submit" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>