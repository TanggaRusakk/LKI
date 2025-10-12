@extends('layout.mainlayout')

@section('content')
<div class="container py-5" data-aos="fade-up">
  <h2 class="text-center text-success fw-bold mb-5">Types of Wood We Handle</h2>

  {{-- Local Woods --}}
  <h4 class="fw-bold mb-3 text-success">🌿 Local Woods (Indonesia)</h4>
  <div class="scrolling-wrapper mb-5" id="local-scroll">
    @foreach ([
      ['name'=>'Jati','region'=>'Indonesia','desc'=>'Strong, durable, and resistant to termites. Ideal for furniture and flooring.','price'=>'Rp 5.000.000/m³','use'=>'Furniture, Flooring','img'=>'https://images.unsplash.com/photo-1603190287605-e6ade32fa852'],
      ['name'=>'Merbau','region'=>'Indonesia','desc'=>'Reddish-brown wood known for strength and weather resistance.','price'=>'Rp 4.800.000/m³','use'=>'Decking, Outdoor frames','img'=>'https://images.unsplash.com/photo-1616628182502-47e4ec7a0e03'],
      ['name'=>'Sengon','region'=>'Indonesia','desc'=>'Light and easy to process, suitable for plywood and crates.','price'=>'Rp 2.300.000/m³','use'=>'Plywood, Packaging','img'=>'https://images.unsplash.com/photo-1600607688412-93c16ab2e1bb']
    ] as $wood)
    <div class="card wood-card shadow-sm">
      <img src="{{ $wood['img'] }}" alt="{{ $wood['name'] }}">
      <div class="p-3">
        <h5 class="fw-bold text-success">{{ $wood['name'] }}</h5>
        <p class="small mb-1"><strong>Region:</strong> {{ $wood['region'] }}</p>
        <p class="small mb-1"><strong>Characteristic:</strong> {{ $wood['desc'] }}</p>
        <p class="small mb-1"><strong>Price:</strong> {{ $wood['price'] }}</p>
        <p class="small"><strong>Best For:</strong> {{ $wood['use'] }}</p>
      </div>
    </div>
    @endforeach
  </div>

  {{-- Imported Woods --}}
  <h4 class="fw-bold mb-3 text-success">🌍 Imported Woods</h4>
  <div class="scrolling-wrapper" id="import-scroll">
    @foreach ([
      ['name'=>'Oak','region'=>'Europe','desc'=>'Dense and strong with elegant grain patterns.','price'=>'Rp 6.500.000/m³','use'=>'Luxury Furniture, Flooring','img'=>'https://images.unsplash.com/photo-1565538810643-b5bdb714032a'],
      ['name'=>'Walnut','region'=>'USA','desc'=>'Dark, rich tone wood ideal for fine furniture.','price'=>'Rp 7.200.000/m³','use'=>'Tabletops, Instruments','img'=>'https://images.unsplash.com/photo-1616628182077-915d4793055b'],
      ['name'=>'Cherry','region'=>'Canada','desc'=>'Smooth and reddish wood, ages beautifully.','price'=>'Rp 6.800.000/m³','use'=>'Cabinetry, Interior Decor','img'=>'https://images.unsplash.com/photo-1587145820263-08dbb9a51f47']
    ] as $wood)
    <div class="card wood-card shadow-sm">
      <img src="{{ $wood['img'] }}" alt="{{ $wood['name'] }}">
      <div class="p-3">
        <h5 class="fw-bold text-success">{{ $wood['name'] }}</h5>
        <p class="small mb-1"><strong>Region:</strong> {{ $wood['region'] }}</p>
        <p class="small mb-1"><strong>Characteristic:</strong> {{ $wood['desc'] }}</p>
        <p class="small mb-1"><strong>Price:</strong> {{ $wood['price'] }}</p>
        <p class="small"><strong>Best For:</strong> {{ $wood['use'] }}</p>
      </div>
    </div>
    @endforeach
  </div>
</div>

<script>
  // Auto-scroll animation
  const scrollLocal = document.getElementById('local-scroll');
  const scrollImport = document.getElementById('import-scroll');

  function autoScroll(el) {
    let scrollAmount = 0;
    const speed = 1;
    function scrollStep() {
      el.scrollLeft += speed;
      scrollAmount += speed;
      if (el.scrollLeft + el.clientWidth >= el.scrollWidth || scrollAmount > el.scrollWidth) {
        el.scrollLeft = 0;
        scrollAmount = 0;
      }
      requestAnimationFrame(scrollStep);
    }
    scrollStep();
  }
  autoScroll(scrollLocal);
  autoScroll(scrollImport);
</script>
@endsection
