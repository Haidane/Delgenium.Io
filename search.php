<script>
    $(document).ready(function () {
    $("#test").CreateMultiCheckBox({ width: '230px', defaultText : 'Select Below', height:'250px' });
    });
</script>
<form action="search.results.php"  method="POST"  class="searchbar">
	<div class="marginSearch">
		<input type="text" name="recherche" placeholder="Nom, Prenom, Email,  Entreprise"  class="search bottom top">
	</div>
	<div class="marginSearch">
	    <select id="test" name=specialite[]>
			<option value="mecenat">Mecenat</option>
			<option value="mentorat">Mentorat</option>
			<option value="consultant">Consultant</option>
			<option value="coaching">Coaching</option>
		    <option value="facilitateur">Facilitateur</option>
		    <option value="formateur">Formateur</option>
		    <option value="enseignant">Enseignant</option>
		    <option value="energetique">Energetique</option>
		</select>
    </div>
    <div class="marginSearch btnSearch">
    	<input type='submit' value="Rechercher" class="searchBtn" />
    </div>
    <div class="marginSearc btnSearchMobile">
    	<button type='submit' class="searchBtn" /><i class="fas fa-search"></i></div>
    </div>
</form>