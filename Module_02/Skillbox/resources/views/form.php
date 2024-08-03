<form name="employee-form" id="employee-form" action="{{ route('storeForm')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="surname">Surname</label>
        <input type="text" name="surname" id="surname" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="position">Position</label>
        <input type="text" name="position" id="position" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="workData">WorkData</label>
        <textarea name="workData" class="form-control" required="true"></textarea>
    </div>
    <div>
        <label for="jsonData">JSON Data:</label>
        <textarea id="jsonData" name="jsonData" rows="10" cols="30"></textarea>
    </div>
    <button type="submit">Submit</button>
</form>
