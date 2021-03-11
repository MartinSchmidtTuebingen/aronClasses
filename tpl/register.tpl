<p>
<form action='index.php?cl=account&fnc=register' method='post' autocomplete='off'
                     onsubmit="if(this.password.value != this.password2.value)
                {alert('Passworteingabe unterscheidet sich!');
                 return false;}">
    <fieldset>
        <legend>Registriere dich:</legend>
<table>
<tr>
<td>
        <label>Username</td><td> <input type='text' name='username' placeholder='MUSTERMENSCH' required/></label></td></tr>
		<td>
</tr><tr>
<td>
        <label>Mailadresse</td><td> <input type='text' name='mailadress' placeholder='mustermensch@mustermail.de' required/></label></td></tr>
		<td>
        <label>Best&auml;tige Mailadresse</td><td> <input type='text' name='maildress2'placeholder='mustermensch@mustermail.de' required/></label></td></tr>
<tr>
<td>
        <label>Passwort</td><td><input type='password' name='password' placeholder='Passwort' required//></br></label></td></tr>
  
  <tr>
  <tr>
<td>
        <label>Best&auml;tige Passwort</td><td><input type='password' name='password2' placeholder='Passwort' required//></br></label></td></tr>
  
  <tr>
<td>      <input type='submit' name='formaction' value='OK'/></td></tr></table>
    </fieldset>
</form>
 
</p>