 
 <!-- Sidebar -->
 <nav id="sidebarMenu" class="collapse d-lg-block sidebar shadow" style="  background: linear-gradient(to right, #b4bdc8, #d1d9e8);">
     <div class="position-sticky  ">
         <div class="list-group list-group-flush  mt-4 ">
             <a href="/" class="list-group-item fs-5 fw-lighter  font-monospace list-group-item-action bg-transparent py-3 ripple {{  (request()->is('/')) ? 'active' : '' }}" aria-current="true">
              <i class="fa-solid fa-house me-3"></i><span>Dashboard</span>
             </a>
             <a href="{{ route('specs.brand') }}" class="list-group-item fs-5 fw-lighter  font-monospace list-group-item-action  py-3 bg-transparent ripple {{  (request()->is('add-brand')) ? 'active' : '' }}">
              <i class="fa-solid fa-image-portrait me-3"></i><span>Brand</span></a>
             <a href="{{ route('specs.colour') }}" class="list-group-item fs-5 fw-lighter  font-monospace list-group-item-action  py-3 bg-transparent ripple {{  (request()->is('add-colour')) ? 'active' : '' }}">
              <i class="fa-solid fa-fill-drip me-3"></i><span>Colour</span>
             </a>
             <a href="{{ route('specs.ram') }}" class="list-group-item fs-5 fw-lighter  font-monospace list-group-item-action  py-3 bg-transparent ripple {{  (request()->is('add-ram')) ? 'active' : '' }}">
              <i class="fa-solid fa-memory me-3"></i><span>RAM</span>
             </a>
             <a href="{{ route('specs.rom') }}" class="list-group-item fs-5 fw-lighter  font-monospace list-group-item-action  py-3 bg-transparent ripple {{  (request()->is('add-rom')) ? 'active' : '' }}">
              <i class="fa-solid fa-sd-card me-3"></i><span>ROM</span></a>
             <a href="" class="list-group-item fs-5 fw-lighter  font-monospace list-group-item-action  py-3 bg-transparent ripple"><i
                     class="fas fa-sign-out fa-fw me-3"></i><span>Logout</span></a>
         </div>
     </div>
 </nav>
