<div class="todo-popup" id="todo-popup">
    <div class="content">
        <a href="./" class="button"></a>
        <form action="./?action=create" class="add-todo" method="post">
            <div>
                <label for="title">Title: <sup>*</sup></label>
                <input type="text" name="title" class="title" id="title" placeholder="Task name" required>
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="description" placeholder="Description text for your Task (Optional)"></textarea>
            </div>
            <div>
                <button class="submit" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>