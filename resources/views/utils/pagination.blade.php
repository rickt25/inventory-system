<div class="card-footer py-4">
  @if ($paginator->hasPages())
    <nav aria-label="...">
      <ul class="pagination justify-content-end mb-0">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">
            <i class="fas fa-angle-left"></i>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        
        <li class="page-item">
          <a class="page-link" href="#">
            <i class="fas fa-angle-right"></i>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
    </nav>
  @endif
</div>