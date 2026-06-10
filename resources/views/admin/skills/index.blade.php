@extends('layouts.admin')
@section('title', 'Skills')
@section('content')
<div class="row g-4">
  <div class="col-lg-7">
    <div class="admin-table">
      <table class="table table-borderless mb-0">
        <thead><tr><th>Skill</th><th>Level</th><th>Order</th><th>Actions</th></tr></thead>
        <tbody>
          @forelse($skills as $skill)
          <tr>
            <td style="font-weight:500">{{ $skill->name }}</td>
            <td>
              <div style="display:flex;align-items:center;gap:0.75rem;min-width:160px">
                <div class="skill-bar" style="flex:1;height:6px">
                  <div class="skill-fill" style="width:{{ $skill->percentage }}%"></div>
                </div>
                <span style="font-size:0.8rem;color:var(--accent-cyan);font-weight:700;width:32px">{{ $skill->percentage }}%</span>
              </div>
            </td>
            <td style="color:var(--text-muted)">{{ $skill->sort_order }}</td>
            <td>
              <div class="d-flex gap-2">
                <button onclick="editSkill({{ $skill->id }},'{{ addslashes($skill->name) }}',{{ $skill->percentage }},{{ $skill->sort_order }})" class="project-link"><i class="bi bi-pencil"></i></button>
                <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" onsubmit="return confirm('Delete?')">
                  @csrf @method('DELETE')
                  <button type="submit" class="project-link" style="border-color:rgba(255,80,80,0.3);color:#ff5050"><i class="bi bi-trash"></i></button>
                </form>
              </div>
            </td>
          </tr>
          @empty
          <tr><td colspan="4" class="text-center" style="padding:2rem;color:var(--text-muted)">No skills yet.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-lg-5">
    <div class="admin-card">
      <h3 id="skillFormTitle" style="font-size:1rem;font-weight:600;margin-bottom:1.25rem">Add New Skill</h3>
      <form id="skillForm" action="{{ route('admin.skills.store') }}" method="POST">
        @csrf
        <input type="hidden" name="_method" id="skillMethod" value="POST">
        <div class="mb-3">
          <label class="form-label">Skill Name *</label>
          <input type="text" name="name" id="skillName" class="form-control" placeholder="e.g. Tableau" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Proficiency: <span id="pctDisplay" style="color:var(--accent-cyan)">80%</span></label>
          <input type="range" name="percentage" id="skillPct" min="0" max="100" value="80"
                 class="form-range" style="accent-color:var(--accent-cyan)"
                 oninput="document.getElementById('pctDisplay').textContent=this.value+'%'">
        </div>
        <div class="mb-4">
          <label class="form-label">Sort Order</label>
          <input type="number" name="sort_order" id="skillOrder" class="form-control" value="0">
        </div>
        <div class="d-flex gap-2">
          <button type="submit" class="btn-primary-custom"><i class="bi bi-check-lg"></i> <span id="skillBtnText">Add Skill</span></button>
          <button type="button" onclick="resetSkillForm()" class="btn-outline-custom">Reset</button>
        </div>
      </form>
    </div>
  </div>
</div>
@push('scripts')
<script>
function editSkill(id, name, pct, order) {
  document.getElementById('skillFormTitle').textContent = 'Edit Skill';
  document.getElementById('skillBtnText').textContent = 'Update Skill';
  document.getElementById('skillForm').action = '/admin/skills/' + id;
  document.getElementById('skillMethod').value = 'PUT';
  document.getElementById('skillName').value = name;
  document.getElementById('skillPct').value = pct;
  document.getElementById('pctDisplay').textContent = pct + '%';
  document.getElementById('skillOrder').value = order;
  document.getElementById('skillForm').scrollIntoView({ behavior: 'smooth' });
}
function resetSkillForm() {
  document.getElementById('skillFormTitle').textContent = 'Add New Skill';
  document.getElementById('skillBtnText').textContent = 'Add Skill';
  document.getElementById('skillForm').action = '{{ route("admin.skills.store") }}';
  document.getElementById('skillMethod').value = 'POST';
  document.getElementById('skillForm').reset();
  document.getElementById('pctDisplay').textContent = '80%';
}
</script>
@endpush
@endsection
