    <form>
        <?php echo validation_errors(); ?>

        <?php echo form_open('news/create'); ?>

        <label for="inputnmTitle">Title</label>
        <input type="text" name="title"  id="inputnmTitle"/><br />

        <label for="inputnmText">Text</label>
        <textarea name="text" id="inputnmText"></textarea><br />

        <input type="submit" name="submit" value="Create news item" />
    </form>