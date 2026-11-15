<div class="mb-3">
    <label class="form-label">{{ __('ui.title') }}</label>
    <input type="text" name="title"
           value="{{ old('title', $conference['title'] ?? '') }}"
           class="form-control">
    @error('title')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">{{ __('ui.description') }}</label>
    <textarea name="description"
              class="form-control">{{ old('description', $conference['description'] ?? '') }}</textarea>
    @error('description')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">{{ __('ui.speaker') }}</label>
    <input type="text" name="speaker"
           value="{{ old('speaker', $conference['speaker'] ?? '') }}"
           class="form-control">
    @error('speaker')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">{{ __('ui.date') }}</label>
    <input type="date" name="date"
           value="{{ old('date', $conference['date'] ?? '') }}"
           class="form-control">
    @error('date')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">{{ __('ui.time') }}</label>
    <input type="time" name="time"
           value="{{ old('time', $conference['time'] ?? '') }}"
           class="form-control">
    @error('time')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">{{ __('ui.location') }}</label>
    <input type="text" name="location"
           value="{{ old('location', $conference['location'] ?? '') }}"
           class="form-control">
    @error('location')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
