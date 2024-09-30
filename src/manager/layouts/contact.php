<!-- templates/contact.php -->

<h1>Contact Us (GET)</h1>
<form action="/contact" method="POST">
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" required>
    <br>
    <label for="message">Mensaje:</label>
    <textarea id="message" name="message" required></textarea>
    <br>
    <input type="submit" value="Enviar">
</form>

<?php echo "Test" ?>