<nav>
    <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/contacts') }}">Contacts</a></li>
        <li><a href="{{ url('/get-employee-data')}}">Employee</a></li>
    </ul>
</nav>

<style>
    ul
    {
        display: flex;
        list-style: none;
        justify-content: space-between;
        width: 80%;
        margin: 0 auto;
        margin-top: 30px;
        margin-bottom: 40px;
    }
    li a
    {
        text-decoration: none;
        color: white;
        border: 2px solid grey;
        padding: 10px 20px;
        background-color: grey;
        border-radius: 10px;
    }
</style>