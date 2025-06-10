@extends('layouts.volunteer')

@section('title', 'My Profile')

@section('content')
<div class="content-area">
    <h2 class="mb-4">My Profile</h2>
    <p class="text-muted mb-5">Manage your personal information, security settings, and volunteering preferences.</p>

    <!-- Success/Error Messages -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        <!-- Profile Card -->
        <div class="col-lg-4 col-md-12">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="profile-avatar mx-auto mb-3" style="width: 120px; height: 120px; font-size: 2rem;">
                        @if ($volunteer->profile_picture)
                            <img src="{{ asset('storage/' . $volunteer->profile_picture) }}" alt="Profile Picture" class="rounded-circle w-100 h-100 object-fit-cover">
                        @else
                            {{ strtoupper(substr($volunteer->name, 0, 1)) }}
                        @endif
                    </div>
                    <h5 class="card-title">{{ $volunteer->name }}</h5>
                    <p class="text-muted">{{ $volunteer->email }}</p>
                    <form action="{{ route('volunteer.profile.picture') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="file" name="profile_picture" id="profilePicture" class="form-control" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Upload Picture</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Profile Details -->
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Personal Information</h5>
                    <form method="POST" action="{{ route('volunteer.profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input id="name" name="name" type="text" value="{{ old('name', $volunteer->name) }}" class="form-control @error('name') is-invalid @enderror" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" name="email" type="email" value="{{ old('email', $volunteer->email) }}" class="form-control @error('email') is-invalid @enderror" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input id="phone" name="phone" type="text" value="{{ old('phone', $volunteer->phone) }}" class="form-control @error('phone') is-invalid @enderror">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="location" class="form-label">Location</label>
                                <input id="location" name="location" type="text" value="{{ old('location', $volunteer->location) }}" class="form-control @error('location') is-invalid @enderror">
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Skills and Preferences -->
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Skills & Interests</h5>
                    <form method="POST" action="{{ route('volunteer.skills.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Skills</label>
                            <select name="skills[]" class="form-select" multiple>
                                @foreach (config('volunteer.skills', []) as $skill)
                                    <option value="{{ $skill }}" {{ in_array($skill, old('skills', $volunteer->skills ?? [])) ? 'selected' : '' }}>{{ $skill }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted">Hold Ctrl/Cmd to select multiple skills.</small>
                            @error('skills')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Volunteering Preferences</label>
                            <div class="form-check">
                                <input type="checkbox" name="preferences[]" value="in_person" class="form-check-input" {{ in_array('in_person', old('preferences', $volunteer->preferences ?? [])) ? 'checked' : '' }}>
                                <label class="form-check-label">In-Person Events</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="preferences[]" value="virtual" class="form-check-input" {{ in_array('virtual', old('preferences', $volunteer->preferences ?? [])) ? 'checked' : '' }}>
                                <label class="form-check-label">Virtual Events</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="preferences[]" value="weekends" class="form-check-input" {{ in_array('weekends', old('preferences', $volunteer->preferences ?? [])) ? 'checked' : '' }}>
                                <label class="form-check-label">Weekends Only</label>
                            </div>
                            @error('preferences')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update Skills & Preferences</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Security Settings -->
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Security Settings</h5>
                    <form method="POST" action="{{ route('volunteer.password.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input id="current_password" name="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" required>
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form>

                    <!-- Two-Factor Authentication -->
                    <div class="mt-4">
                        <h6 class="mb-3">Two-Factor Authentication</h6>
                        @if ($volunteer->two_factor_enabled)
                            <p class="text-success">2FA is enabled.</p>
                            <form method="POST" action="{{ route('volunteer.2fa.disable') }}">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Disable 2FA</button>
                            </form>
                        @else
                            <p class="text-muted">Enhance your account security with 2FA.</p>
                            <form method="POST" action="{{ route('volunteer.2fa.enable') }}">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-sm btn-outline-success">Enable 2FA</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity Summary -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Recent Activity</h5>
                    @if (isset($recentActivities) && count($recentActivities) > 0)
                        <ul class="list-group list-group-flush">
                            @foreach ($recentActivities as $activity)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fas fa-{{ $activity->type == 'signup' ? 'calendar-plus' : 'comment-alt' }} me-2 text-primary"></i>
                                        {{ $activity->description }}
                                    </div>
                                    <span class="text-muted small">{{ $activity->created_at->diffForHumans() }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">No recent activity. Start volunteering to see your actions here!</p>
                    @endif
                    <a href="{{ route('volunteer.feedback.index') }}" class="btn btn-sm btn-outline-primary mt-3">View All Activity</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Preview profile picture before upload
    document.getElementById('profilePicture')?.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const avatar = document.querySelector('.profile-avatar');
                avatar.innerHTML = `<img src="${e.target.result}" alt="Profile Picture Preview" class="rounded-circle w-100 h-100 object-fit-cover">`;
            };
            reader.readAsDataURL(file);
        }
    });

    // Animation for cards
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.card');
        cards.forEach((card, index) => {
            card.style.animation = `fadeIn 0.5s ease forwards ${index * 0.1}s`;
        });
    });
</script>
@endpush