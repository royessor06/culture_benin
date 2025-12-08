@extends('acceuil')

@section('content')
<section class="detail-page">
  <h2>Art & Artisanat du Bénin</h2>
  <p>
    Découvrez les sculptures, masques, tissus et objets artisanaux qui reflètent
    l’identité culturelle du Bénin.
  </p>
  <img src="{{ asset('assets/img/art.jpg') }}" alt="Artisanat béninois">

  <!-- Icône commentaire -->
  <div class="comment-section">
    <button class="comment-btn">
      💬 Commentaire
    </button>
  </div>
</section>
@endsection
