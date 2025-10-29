<div>
    <label for="description">Description</label>
    <textarea name="description" id="description" required>{{ old('description', $evidence->description ?? '') }}</textarea>
</div>

<div class="mt-4">
    <label for="file">File</label>
    <input type="file" name="file" id="file">
</div>
