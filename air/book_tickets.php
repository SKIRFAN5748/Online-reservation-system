<style>
			input {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 30px;
			}
			input[type=submit] {
				background-color: #030337;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 127px
			}
			input[type=date] {
				border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 5.5px 44.5px;
			}
			select {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 6.5px 75.5px;
			}
		</style>

    <section class="content">
        <div class="container-fluid"style="opacity: 0.6;">

            <div class="card card-success">
                <div class="card-header">
                    <h2>SEARCH FOR AVAILABLE FLIGHTS</h2>
                </div>
                <div class="card-body">
                    <form action="air.php?page=availableflights" method="post">

                        <table cellpadding="5">
                            <tr>
                                <td class="fix_table">Enter the Origin</td>
                                <td class="fix_table">Enter the Destination</td>
                            </tr>
                            <tr>
                                <td class="fix_table">
                                    <input list="origins" name="origin" placeholder="From" required>
                                    <datalist id="origins">
                                        <option value="bangalore">
                                    </datalist>
                                    <!-- <input type="text" name="origin" placeholder="From" required> -->
                                </td>
                                <td class="fix_table">
                                    <input list="destinations" name="destination" placeholder="To" required>
                                    <datalist id="destinations">
                                        <option value="mumbai">
                                        <option value="mysore">
                                        <option value="mangalore">
                                        <option value="chennai">
                                        <option value="hyderabad">
                                    </datalist>
                                    <!-- <input type="text" name="destination" placeholder="To" required> -->
                                </td>
                            </tr>
                        </table>
                        <br>
                        <table cellpadding="5">
                            <tr>
                                <td class="fix_table">Enter the Departure Date</td>
                                <td class="fix_table">Enter the No. of Passengers</td>
                            </tr>
                            <tr>
                                <td class="fix_table"><input type="date" name="dep_date" min=<?php 
							$todays_date=date('Y-m-d'); 
							echo $todays_date;
						?> max=<?php 
							$max_date=date_create(date('Y-m-d'));
							date_add($max_date,date_interval_create_from_date_string("90 days")); 
							echo date_format($max_date,"Y-m-d");
						?> required></td>
                                <td class="fix_table"><input type="number" name="no_of_pass" placeholder="Eg. 5"
                                        required></td>
                            </tr>
                        </table>
                        <br>
                        <table cellpadding="5">
                            <tr>
                                <td class="fix_table">Enter the Class</td>
                            </tr>
                            <tr>
                                <td class="fix_table">
                                    <select name="class">
                                        <option value="economy">Economy</option>
                                        <option value="business">Business</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <a href="air.php?page=availableflights"><button class="btn btn-primary" type="submit"
                                name="Search">Search for Available Flights</button></a>

                    </form>
                    <!--Following data fields were empty!
			...
			ADD VIEW FLIGHT DETAILS AND VIEW JETS/ASSETS DETAILS for ADMIN
		-->
                </div>
            </div>
    </section>
</div>