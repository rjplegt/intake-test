<form action="/pages/customers/customers.actions.php?action=new" method="post">
    <h3>Persoon</h3>
    <table>
        <tr>
            <td>Voornaam:</td>
            <td><input name="first_name"></td>
        </tr>
        <tr>
            <td>Achternaam:</td>
            <td><input name="last_name"></td>
        </tr>
        <tr>
            <td>Leeftijd:</td>
            <td><input name="leeftijd"></td>
        </tr>
    </table>
    <h3> Auto</h3>
    <table>
        <tr>
            <td>Merk:</td>
            <td><input name="brand"></td>
        </tr>
        <tr>
            <td>Type:</td>
            <td><input name="type"></td>
        </tr>
    </table>
    <input type="submit" value="Invoeren"/>
</form>