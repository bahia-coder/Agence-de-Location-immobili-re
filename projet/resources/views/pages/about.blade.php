@extends('layouts.app')

@section('content')
    <div class="site-blocks-cover inner-page-cover overlay"
        style="background-image: url({{ asset('assets/images/hero_bg_3.jpg') }});" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <h1 class="mb-2">À propos de Homeland</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{asset('assets/images/about.jpg')}}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-5 ml-auto" data-aos="fade-up" data-aos-delay="200">
                    <div class="site-section-title">
                        <h2>Notre entreprise</h2>
                    </div>
                    <p class="lead">Homeland est une agence immobilière innovante, spécialisée dans la promotion, la vente et la location de biens résidentiels et commerciaux.</p>
                    <p>Fondée en 2015, Homeland accompagne ses clients dans leurs projets immobiliers en offrant un service personnalisé, transparent et orienté vers la qualité. Notre équipe d'experts vous guide tout au long du processus, de la recherche de bien jusqu’à la signature de l’acte de vente ou du contrat de location.</p>
                    <p><a href="#" class="btn btn-outline-primary rounded-0 py-2 px-5">En savoir plus</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center" data-aos="fade-up">
                <div class="col-md-7">
                    <div class="site-section-title text-center">
                        <h2>Notre Équipe</h2>
                        <p>Notre équipe est composée de professionnels passionnés par l’immobilier, dotés d’une solide expérience et d’une connaissance approfondie du marché local.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Exemple de membres -->
                @php
                    $team = [
                        ['name' => 'Megan Smith', 'role' => 'Conseillère immobilière', 'image' => 'person_1.jpg'],
                        ['name' => 'Brooke Cagle', 'role' => 'Consultante en investissement', 'image' => 'person_2.jpg'],
                        ['name' => 'Philip Martin', 'role' => 'Directeur des ventes', 'image' => 'person_3.jpg'],
                    ];
                @endphp
                @foreach ($team as $index => $member)
                    <div class="col-md-6 col-lg-4 mb-5 mb-lg-5" data-aos="fade-up" data-aos-delay="{{ 200 + ($index * 100) }}">
                        <div class="team-member">
                            <img src="{{ asset('assets/images/' . $member['image']) }}" alt="Image" class="img-fluid rounded mb-4">
                            <div class="text">
                                <h2 class="mb-2 font-weight-light text-black h4">{{ $member['name'] }}</h2>
                                <span class="d-block mb-3 text-white-opacity-05">{{ $member['role'] }}</span>
                                <p>Professionnel(le) reconnu(e), {{ $member['name'] }} accompagne nos clients avec dévouement dans leurs projets d’achat, de vente ou de location.</p>
                                <p>
                                    <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                                    <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                                    <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container" data-aos="fade">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7">
                    <div class="site-section-title text-center">
                        <h2>Nos Agents</h2>
                        <p>Des agents de terrain dynamiques et compétents, prêts à vous accompagner dans toutes vos démarches immobilières, avec réactivité et professionnalisme.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Exemple d'agents -->
                @php
                    $agents = [
                        ['name' => 'Steven Ericson', 'role' => 'Agent immobilier', 'image' => 'person_4.jpg'],
                        ['name' => 'Nathan Dumlao', 'role' => 'Conseiller locatif', 'image' => 'person_5.jpg'],
                        ['name' => 'Sofia Durand', 'role' => 'Experte du marché', 'image' => 'person_2.jpg'],
                    ];
                @endphp
                @foreach ($agents as $agent)
                    <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
                        <div class="team-member">
                            <img src="{{ asset('assets/images/' . $agent['image']) }}" alt="Image" class="img-fluid rounded mb-4">
                            <div class="text">
                                <h2 class="mb-2 font-weight-light text-black h4">{{ $agent['name'] }}</h2>
                                <span class="d-block mb-3 text-white-opacity-05">{{ $agent['role'] }}</span>
                                <p>{{ $agent['name'] }} met tout en œuvre pour satisfaire les besoins de nos clients en proposant les meilleures opportunités du marché.</p>
                                <p>
                                    <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                                    <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                                    <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center">
                    <div class="site-section-title">
                        <h2>Foire Aux Questions</h2>
                    </div>
                    <p>Retrouvez ici les réponses aux questions les plus fréquemment posées sur nos services et notre fonctionnement.</p>
                </div>
            </div>
            <div class="row justify-content-center" data-aos="fade" data-aos-delay="100">
                <div class="col-md-8">
                    <div class="accordion unit-8" id="accordion">
                        @php
                            $faqs = [
                                ['q' => 'Quel est le nom de votre entreprise ?', 'a' => 'Notre entreprise s’appelle Homeland, spécialisée dans l’immobilier depuis 2015.'],
                                ['q' => 'Quels sont vos frais pour 3 mois de gestion locative ?', 'a' => 'Les frais varient selon le bien et le contrat. Contactez-nous pour un devis personnalisé.'],
                                ['q' => 'Dois-je obligatoirement m’inscrire sur votre site ?', 'a' => 'L’inscription n’est pas obligatoire pour consulter les biens, mais elle est recommandée pour bénéficier d’un suivi personnalisé.'],
                                ['q' => 'Qui puis-je contacter en cas de besoin ?', 'a' => 'Notre service client est joignable par téléphone, email, ou via le formulaire de contact.']
                            ];
                        @endphp
                        @foreach ($faqs as $index => $faq)
                            <div class="accordion-item">
                                <h3 class="mb-0 heading">
                                    <a class="btn-block" data-toggle="collapse" href="#collapse{{ $index }}" role="button"
                                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                        aria-controls="collapse{{ $index }}">
                                        {{ $faq['q'] }}<span class="icon"></span>
                                    </a>
                                </h3>
                                <div id="collapse{{ $index }}" class="collapse {{ $index === 0 ? 'show' : '' }}"
                                    aria-labelledby="heading{{ $index }}" data-parent="#accordion">
                                    <div class="body-text">
                                        <p>{{ $faq['a'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
