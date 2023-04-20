<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('BIENVENUE CHEZ XLOT') }}
        </h2>
    </x-slot>
    <!-- image principale -->
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <img src="https://fiches-pratiques.chefdentreprise.com/Assets/Img/FICHEPRATIQUE/2021/12/368263/Les-etapes-creation-site-commerce-F.jpg" height="130px" class="mx-auto d-block">
        </div>
      </div>
    </div>
    <div class="container text center">
      <div class="row">
        <div class="col">
          <button type="button" class="btn btn-link"><a href="produit/liste">Je souhaite faire des achats</a></button>
        </div>
        <div class="col">
          <button type="button" class="btn btn-link"><a href="">A propos de l'entreprise</a></button>
        </div>
      </div>
    </div>
            
</x-app-layout>
