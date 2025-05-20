<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Article Form</title>
</head>
<body style="font-family: sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; background: #f9f9f9;">

  <div style="width: 100%; max-width: 500px; background: white; box-shadow: 0 4px 12px rgba(0,0,0,0.1); border-radius: 8px; padding: 24px;">
    
    <!-- Card Header -->
    <div style="text-align: center; margin-bottom: 20px;">
      <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 4px;">World Of Creativity</h2>
      <p style="font-size: 14px; color: #666;">Create your next amazing article</p>
    </div>

    <!-- Form -->
    <form>
      <!-- Title Field -->
      <div style="margin-bottom: 16px;">
        <label for="title" style="display: block; font-weight: 600; margin-bottom: 6px;">Article Title</label>
        <input
          id="title"
          name="title"
          type="text"
          placeholder="Enter a compelling title"
          style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;"
        />
        <p style="font-size: 12px; color: #999; margin-top: 4px;">Make it catchy and descriptive</p>
      </div>

      <!-- Description Field -->
      <div style="margin-bottom: 16px;">
        <label for="description" style="display: block; font-weight: 600; margin-bottom: 6px;">Article Description</label>
        <textarea
          id="description"
          name="description"
          placeholder="Briefly describe what your article is about"
          style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; min-height: 100px; resize: none;"
        ></textarea>
      </div>

      <!-- Submit Button -->
      <button
        type="submit"
        style="width: 100%; padding: 10px; background-color: #000; color: #fff; border: none; border-radius: 4px; font-weight: bold; cursor: pointer;"
      >
        Create Article
      </button>
    </form>

    <!-- Card Footer -->
    <div style="text-align: center; margin-top: 24px; border-top: 1px solid #eee; padding-top: 12px;">
      <p style="font-size: 12px; color: #999;">Your article will be reviewed before publishing</p>
    </div>
  </div>

</body>
</html>
