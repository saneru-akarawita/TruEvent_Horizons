<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-2">

	<?php foreach ($data['services'] as $sDetails) : ?>

		<header class="full-header">
			<div class="header-center verticalCenter">
				<h1 class="header-topic"><?php echo $sDetails->name; ?> Info</h1>
			</div>
			<div class="header-right verticalCenter">
				<span class="top-right-closeBtn" onclick="history.back()">
					<i class=" fal fa-times fa-2x "></i>
				</span>
			</div>
		</header>

		<div class="content contentNewRes">
			<div class="newService-main newservice" id="newServiceMain">
				<form class="form" action="">

					<!-- Basic information -->
					<div class="newService-sub-head">
						<h3>Basic Info</h3>
					</div>

					<div class="newService-sub">
						<!-- service name -->
						<div class="row">
							<div class="column">
								<div class="text-group">
									<div class="labels"><label class="labels" for="serviceID"> Service ID</label></div>
									<input type="text" name="" id="serviceID" placeholder="S<?php echo $sDetails->serviceID; ?>" disabled>
								</div>
							</div>
							<div class="column">
								<div class="text-group">
									<div class="labels"><label class="labels" for="serviceName"> Service Name</label></div>
									<input type="text" name="" id="serviceName" placeholder="<?php echo $sDetails->name; ?>" disabled>
								</div>
							</div>
						</div>
						<!-- end of service name -->

						<!-- service type -->
						<div class="row">
							<div class="column">

								<!-- New customer category -->
								<div class="labels"><label class="labels" for="serviceCusCategory">Customer Category</label></div>
								<input type="text" name="" id="serviceCusCategory" placeholder="<?php if ($sDetails->customerCategory == 1) : ?>Male<?php elseif ($sDetails->customerCategory == 2) : ?>Female<?php else : ?>Male & Female<?php endif; ?>" disabled>
								<!-- end of customer category -->

								<!-- New service type -->
								<div class="row5">
									<div class="labels"><label class="labels" for="serviceType">Service Type</label></div>
									<input type="text" name="" id="serviceType" placeholder="<?php echo $sDetails->type; ?>" disabled>
								</div>
								<!-- end of service type -->


								<!-- Service price -->
								<div class="row6">
									<div class="labels"><label class="labels" for="servicePrice">Price</label></div>
									<input type="text" name="" id="servicePrice" placeholder="<?php echo number_format($sDetails->price, 2, '.', ' '); ?> LKR" disabled>
								</div>
								<!-- End of ervice price -->
							</div>

							<!-- Employees -->
							<div class="column">
								<div class="labels"><label class="labels" for="serviceEmp">Employee</label></div>
								<div class="checkbox-div">

									<?php foreach ($data['sProv'] as $sProvDetails) : ?>
										<div class="divIndiv">
											<lable class="lableInDiv"><?php echo $sProvDetails->staffID; ?> - <?php echo $sProvDetails->fName; ?> <?php echo $sProvDetails->lName; ?></lable>
										</div>
										<hr class="resHr">
									<?php endforeach; ?>

								</div>
							</div>
							<!-- End of employees -->
						</div>
					</div>
					<!-- end of Basic information -->

					<!-- Duration and Resources -->
					<div class="newService-sub-head">
						<h3>Duration and Resources</h3>
					</div>
					<div class="timeDurations" id="addDiv">

						<?php if ($data['noofSlots'] == 1 || $data['noofSlots'] == 2 || $data['noofSlots'] == 3) : ?>
							<div class="newService-sub">
								<h4 class="paddingBottom">Slot 1</h4>
								<!-- slot 1-->
								<div class="row " id="slotdetails1">
									<!-- duration -->
									<div class="column">
										<div class="labels"><label class="labels paddingBottom">Duration</label></div>
										<input type="text" name="" id="" placeholder="<?php echo DateTimeExtended::minsToDuration($data['sSlot1Duration']); ?>" disabled>
									</div>
									<!-- end of duration -->

									<!-- quantity -->
									<div class="column" id="resorceDetails1">
										<div class="labels"><label class="labels paddingBottom">Resources & Quantity</label></div>
										<div class="checkbox-div">
											<?php if (empty($data['sResS1'])) : ?>
												<div class="divIndiv">
													<p class="resource-align">None of Resources has Allocated...
													</p>
												</div>
											<?php else : ?>
												<?php foreach ($data['sResS1'] as $sResDetails) : ?>
													<div class="divIndiv">
														<p class="resource-align"><?php echo $sResDetails->resourceID; ?> - <?php echo $sResDetails->name; ?>
															<lable class="quantity-align"><?php echo $sResDetails->requiredQuantity; ?></lable>
														</p>
													</div>
													<hr class="resHr">
												<?php endforeach; ?>
											<?php endif; ?>
										</div>
										<!-- end of quantity -->
									</div>
									<!-- slot 1-->
								</div>
							</div>
						<?php endif; ?>

						<?php if ($data['noofSlots'] == 2) : ?>
							<div class="newService-sub">
								<h4 class="paddingBottom">Slot 2</h4>
								<!-- slot 1-->
								<div class="row " id="slotdetails2">
									<!-- duration -->
									<div class="column">
										<div class='row2' id='intervalDetails1'>
											<label class='labels'>Interval Duration</label><br>
											<?php $i = $data['sInterval1Duration']; ?>
											<?php if ($i == 60 || $i == 120) : ?>
												<input type="text" name="" id="" placeholder="<?php echo ($i / 60); ?> h" disabled>
											<?php elseif ($i > 60 && $i < 120) : ?>
												<input type="text" name="" id="" placeholder="<?php echo ($i / $i); ?> h <?php echo ($i %  60); ?> mins" disabled>
											<?php else : ?>
												<input type="text" name="" id="" placeholder="<?php echo $i; ?> mins" disabled>
											<?php endif; ?>
										</div>
										<div class='row4' id='slotDetails" + i + "'>
											<label class='labels'>Slot Duration</label><br>
											<input type="text" name="" id="" placeholder="<?php echo DateTimeExtended::minsToDuration($data['sSlot2Duration']); ?>" disabled>
										</div>
									</div>
									<!-- end of duration -->

									<!-- quantity -->
									<div class="column" id="resorceDetails2">
										<div class="labels"><label class="labels paddingBottom">Resources & Quantity</label></div>
										<div class="checkbox-div">
											<?php if (empty($data['sResS2'])) : ?>
												<div class="divIndiv">
													<p class="resource-align">None of Resources has Allocated...</p>
												</div>
											<?php else : ?>
												<?php foreach ($data['sResS2'] as $sResDetails) : ?>
													<div class="divIndiv">
														<p class="resource-align"><?php echo $sResDetails->resourceID; ?> - <?php echo $sResDetails->name; ?>
															<lable class="quantity-align"><?php echo $sResDetails->requiredQuantity; ?></lable>
														</p>
													</div>
													<hr class="resHr">
												<?php endforeach; ?>
											<?php endif; ?>
										</div>
										<!-- end of quantity -->
									</div>
								</div>
							</div>

						<?php endif; ?>

						<?php if ($data['noofSlots'] == 3) : ?>
							<div class="newService-sub">
								<h4 class="paddingBottom">Slot 2</h4>
								<!-- slot 1-->
								<div class="row " id="slotdetails2">
									<!-- duration -->
									<div class="column">
										<div class='row2' id='intervalDetails1'>
											<label class='labels'>Interval Duration</label><br>
											<?php $i = $data['sInterval1Duration']; ?>
											<?php if ($i == 60 || $i == 120) : ?>
												<input type="text" name="" id="" placeholder="<?php echo ($i / 60); ?> h" disabled>
											<?php elseif ($i > 60 && $i < 120) : ?>
												<input type="text" name="" id="" placeholder="<?php echo ($i / $i); ?> h <?php echo ($i %  60); ?> mins" disabled>
											<?php else : ?>
												<input type="text" name="" id="" placeholder="<?php echo $i; ?> mins" disabled>
											<?php endif; ?>
										</div>
										<div class='row4' id='slotDetails" + i + "'>
											<label class='labels'>Slot Duration</label><br>
											<input type="text" name="" id="" placeholder="<?php echo DateTimeExtended::minsToDuration($data['sSlot2Duration']); ?>" disabled>
										</div>
									</div>
									<!-- end of duration -->

									<!-- quantity -->
									<div class="column" id="resorceDetails2">
										<div class="labels"><label class="labels paddingBottom">Resources & Quantity</label></div>
										<div class="checkbox-div">
											<?php if (empty($data['sResS2'])) : ?>
												<div class="divIndiv">
													<p class="resource-align">None of Resources has Allocated...</p>
												</div>
											<?php else : ?>
												<?php foreach ($data['sResS2'] as $sResDetails) : ?>
													<div class="divIndiv">
														<p class="resource-align"><?php echo $sResDetails->resourceID; ?> - <?php echo $sResDetails->name; ?>
															<lable class="quantity-align"><?php echo $sResDetails->requiredQuantity; ?></lable>
														</p>
													</div>
													<hr class="resHr">
												<?php endforeach; ?>
											<?php endif; ?>
										</div>
										<!-- end of quantity -->
									</div>
								</div>
							</div>
							<div class="newService-sub">
								<h4 class="paddingBottom">Slot 3</h4>
								<!-- slot 1-->
								<div class="row " id="slotdetails3">
									<!-- duration -->
									<div class="column">
										<div class='row2' id='intervalDetails1'>
											<label class='labels'>Interval Duration</label><br>
											<?php $i = $data['sInterval2Duration']; ?>
											<?php if ($i == 60 || $i == 120) : ?>
												<input type="text" name="" id="" placeholder="<?php echo ($i / 60); ?> h" disabled>
											<?php elseif ($i > 60 && $i < 120) : ?>
												<input type="text" name="" id="" placeholder="<?php echo ($i / $i); ?> h <?php echo ($i %  60); ?> mins" disabled>
											<?php else : ?>
												<input type="text" name="" id="" placeholder="<?php echo $i; ?> mins" disabled>
											<?php endif; ?>
										</div>
										<div class='row4' id='slotDetails" + i + "'>
											<label class='labels'>Slot Duration</label><br>
											<input type="text" name="" id="" placeholder="<?php echo DateTimeExtended::minsToDuration($data['sSlot3Duration']); ?>" disabled>
										</div>
									</div>
									<!-- end of duration -->

									<!-- quantity -->
									<div class="column" id="resorceDetails3">
										<div class="labels"><label class="labels paddingBottom">Resources & Quantity</label></div>
										<div class="checkbox-div">
											<?php if (empty($data['sResS3'])) : ?>
												<div class="divIndiv">
													<p class="resource-align">None of Resources has Allocated...</p>
												</div>
											<?php else : ?>
												<?php foreach ($data['sResS3'] as $sResDetails) : ?>
													<div class="divIndiv">
														<p class="resource-align"><?php echo $sResDetails->resourceID; ?> - <?php echo $sResDetails->name; ?>
															<lable class="quantity-align"><?php echo $sResDetails->requiredQuantity; ?></lable>
														</p>
													</div>
													<hr class="resHr">
												<?php endforeach; ?>
											<?php endif; ?>
										</div>
										<!-- end of quantity -->
									</div>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</form>
			</div>
		</div>
	<?php endforeach; ?>

	<?php require APPROOT . "/views/inc/footer.php" ?>