
<h2>liste Voiture</h2>

<a href="?action=createCar" class="m-3">Ajouter</a>

<table class="table table-striped table-hover">
    <tr class="table-dark">
        <th>Id</th>
        <th>Marque</th>
        <th>Prix</th>
        <th>Proprio</th>
        <th>Action</th>
    </tr>

    <tr>
        <?php foreach($cars as $car): ?>
            <tr>
                <td> <?= $car->getId(); ?> </td>
                <td> <?= $car->getMarque(); ?> </td>
                <td> <?= $car->getPrix(); ?> </td>
                <!-- $car est un obj voiture. $car->getUser() donne un objet User donc pour récupérer un attribut de User on ajoute un get  -->
                <td> <?= $car->getUser()->getLogin(); ?> </td>
                <td>
                    <a href="?action=deleteCar&id=<?= $car->getId(); ?>">Delete</a>
                    <a href="?action=updateCar&id=<?= $car->getId(); ?>">Update</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tr>
</table>