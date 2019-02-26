<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Login</th>
                                    <th>Password</th>
                                    <th>Email</th>
                                    <th>Nom</th>
                                    <th>Role</th>
                                    <th>Update</th>
				    
					</td>
                                 </tr>
                            </thead>

                            <tbody>
                           <?php
                        $result=db_getInternaute();
                         if($result->num_rows>0) {
                                while ($row_internaute=$result->fetch_array(MYSQLI_ASSOC)) {
                                 ?>
                                <tr>
                                    <td><?php echo $row_internaute["login"];?></td>
                                    <td><?php echo $row_internaute["password"];?></td>
                                    <td><?php echo $row_internaute["email"];?></td>
                                    <br/>
                                    <td><?php echo $row_internaute["nom"];?></td>
                                    <td><?php echo $row_internaute["role"];?></td>
                                    <td>
                        <a href="#" onclick="navigate('<?php echo encrypt('update_internaute','DISII28');?>',<?php echo $row_internaute["id"]?>)
                        ;">Modifier</a>
                    </td>
  									</td>
                             </tbody>
                                <?php } ?>
                                <?php } ?>
                                
                            </tbody>
                        </table>