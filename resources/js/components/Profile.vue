<style>
.widget-user-header {
  background-position: center center;
  background-size: cover;
}
</style>

<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-3">
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header text-white" style="background-image: url('./img/6lack.jpg')">
            <h3 class="widget-user-username">Elizabeth Pierce</h3>
            <h5 class="widget-user-desc">Web Designer</h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle" :src="getProfilePhoto()" alt="User Avatar" />
          </div>
          <div class="box-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">3,200</h5>
                  <span class="description-text">SALES</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">13,000</h5>
                  <span class="description-text">FOLLOWERS</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <div class="description-block">
                  <h5 class="description-header">35</h5>
                  <span class="description-text">PRODUCTS</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
      </div>

      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class=""><a href="#activity" data-toggle="tab" aria-expanded="false">Activity</a></li>
            <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
            <li class="active"><a href="#settings" data-toggle="tab" aria-expanded="true">Settings</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane" id="activity">
              <!-- Post -->
              <div class="post">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="" alt="user image" />
                  <span class="username">
                    <a href="#">Jonathan Burke Jr.</a>
                    <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                  </span>
                  <span class="description">Shared publicly - 7:30 PM today</span>
                </div>
                <!-- /.user-block -->
                <p>Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.</p>
                <ul class="list-inline">
                  <li>
                    <a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a>
                  </li>
                  <li>
                    <a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                  </li>
                  <li class="pull-right">
                    <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a>
                  </li>
                </ul>

                <input class="form-control input-sm" type="text" placeholder="Type a comment" />
              </div>
              <!-- /.post -->

              <!-- Post -->
              <div class="post clearfix">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="" alt="User Image" />
                  <span class="username">
                    <a href="#">Sarah Ross</a>
                    <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                  </span>
                  <span class="description">Sent you a message - 3 days ago</span>
                </div>
                <!-- /.user-block -->
                <p>Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.</p>

                <form class="form-horizontal">
                  <div class="form-group margin-bottom-none">
                    <div class="col-sm-9">
                      <input class="form-control input-sm" placeholder="Response" />
                    </div>
                    <div class="col-sm-3">
                      <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.post -->

              <!-- Post -->
              <div class="post">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="" alt="User Image" />
                  <span class="username">
                    <a href="#">Adam Jones</a>
                    <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                  </span>
                  <span class="description">Posted 5 photos - 5 days ago</span>
                </div>
                <!-- /.user-block -->
                <div class="row margin-bottom">
                  <div class="col-sm-6">
                    <!-- <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo"> -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- <img class="img-responsive" src="../../dist/img/photo2.png" alt="Photo">
                          <br>
                          <img class="img-responsive" src="../../dist/img/photo3.jpg" alt="Photo"> -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-6">
                        <img class="img-responsive" src="" alt="Photo" />
                        <br />
                        <img class="img-responsive" src="" alt="Photo" />
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <ul class="list-inline">
                  <li>
                    <a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a>
                  </li>
                  <li>
                    <a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                  </li>
                  <li class="pull-right">
                    <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a>
                  </li>
                </ul>

                <input class="form-control input-sm" type="text" placeholder="Type a comment" />
              </div>
              <!-- /.post -->
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="timeline">
              <!-- The timeline -->
              <ul class="timeline timeline-inverse">
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-red"> 10 Feb. 2014 </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-envelope bg-blue"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                    <div class="timeline-body">Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle quora plaxo ideeli hulu weebly balihoo...</div>
                    <div class="timeline-footer">
                      <a class="btn btn-primary btn-xs">Read more</a>
                      <a class="btn btn-danger btn-xs">Delete</a>
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-user bg-aqua"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                    <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-comments bg-yellow"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                    <div class="timeline-body">Take me to your leader! Switzerland is small and neutral! We are more like Germany, ambitious and misunderstood!</div>
                    <div class="timeline-footer">
                      <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-green"> 3 Jan. 2014 </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-camera bg-purple"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                    <div class="timeline-body">
                      <!-- <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin"> -->
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li>
              </ul>
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane active" id="settings">
              <form class="form-horizontal" @submit.prevent="createProfile">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" v-model="userProfile.name" class="form-control" id="inputName" placeholder="Name" />
                    <small style="color:red;" v-if="userProfile.error">{{userProfile.error[0]}}</small> 
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" v-model="userProfile.email" class="form-control" id="inputEmail" placeholder="Email" />
                    <small style="color:red;" v-if="userProfile.error">{{userProfile.error[0]}}</small> 
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" v-model="userProfile.experience" id="inputExperience" placeholder="Experience"></textarea>
                    <small style="color:red;" v-if="userProfile.error">{{userProfile.error[0]}}</small> 
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPhoto" class="col-sm-2 control-label">Photo</label>

                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="inputPhoto" placeholder="photo" @change="uploadPhoto" />
                    <small style="color:red;" v-if="userProfile.error">{{error.userProfile[0]}}</small> 
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Passport (leave empty if not changing)</label>

                  <div class="col-sm-12">
                    <input type="passport" class="form-control" id="passport" placeholder="passport" />
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label> <input type="checkbox" /> I agree to the <a href="#">terms and conditions</a> </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      profile: {},
      userProfile: {
        name: '',
        email: '',
        experience: '',
        photo: [],
        error: '',
      },
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  created() {
    console.log("profile loading");
  },
  methods: {
    createProfile() {
      const formData = new FormData();
      formData.append('name', this.userProfile.name);
      formData.append('email', this.userProfile.email);
      formData.append('experience', this.userProfile.experience);
      formData.append('photo', this.userProfile.photo);
      // this.$progress.start();
      axios.post('api/profile/create', formData)
      .then((response) => {
        this.data = response.data
        console.log(reponse.data)
      });
    },
    getProfilePhoto(){
      return "profilepics/"+ this.userProfile.photo;
      console.log(this.userProfile.photo)
    },
    // updateProfile(e){
    //   // console.log('uploading');
    //   let file = e.target.files[0];
    //   console.log(file);
    //   let reader = new FileReader();
    //   reader.onloadend = (file) => {
    //     console.log('RESULT', reader.result);
    //     this.photo = reader.result;
    //   }
    //   reader.readAsDataURL(file)
    // }
    uploadPhoto() {
      let input = event.target;
      this.userProfile.photo = input.files[0];
      console.log(this.userProfile.photo);
    },
  },
}
//   created() {
//     this.$Progress.start();
//     axios.post("/api/profile", formData).then(({ data }) => this.data);
//   },
// };
</script>
